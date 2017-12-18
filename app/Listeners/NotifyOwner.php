<?php

namespace App\Listeners;

use App\Events\MessageRecieved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyOwner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageRecieved  $event
     * @return void
     */
    public function handle(MessageRecieved $event)
    {
        $message = $event->messageRecieved;

        Mail::send('emails.recibido', ['msg' => $message], function ($email) use ($message) {
            $email->to(config('mail.from.address'), config('mail.from.name'))
                  ->from($message->email, $message->name)
                  ->subject('Has recibido un nuevo mensaje de '. $message->name);
        });
    }
}
