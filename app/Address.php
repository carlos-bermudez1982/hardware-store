<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
    	'address','zipcode','city_id','user_id',
    ];

    
}
