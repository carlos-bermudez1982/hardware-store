<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Category extends Model
{
    //
    protected $fillable = [
    	'name'
    ];

    public function product() {
    	return $this->hasMany(Item::class);
    }
}
