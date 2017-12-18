<?php

namespace App\Listeners;

use App\Events\MessageRecieved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AutoResponder
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
            $email->to($message->email, $message->name)
                  ->subject('Mensaje fue recibido de '. $message->name);
        });
    }
}
