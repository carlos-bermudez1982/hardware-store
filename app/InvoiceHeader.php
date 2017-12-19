<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceHeader extends Model
{
    //
    protected $fillable = [
    	'user_id', 'address_id', 'phone_id', 'card_id',
    ];
}
