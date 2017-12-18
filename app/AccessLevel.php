<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class AccessLevel extends Model
{
    //
    protected $fillable = [
    	'name',
    ];

    public function user() {
    	$this->hasMany(User::class);
    }
}
