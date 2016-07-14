<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table = 'news';

    public function newstype()
    {
        return $this->belongsTo('App\Newstype','typeid','id');
    }
}
