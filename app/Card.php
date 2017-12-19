<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $fillable = [
    	'card_number','exp_month','exp_year','card_name', 'type_id', 'user_id',
    ];
}
