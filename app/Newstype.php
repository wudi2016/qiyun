<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newstype extends Model
{   
	protected $table = 'newstype';
    public function news()
    {
        return $this->hasMany('App\News','typeid','id');
    }
}
