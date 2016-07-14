<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departmenttech extends Model
{
    protected $table = 'departmenttech';

    public function techresearch()
    {
        return $this->belongsTo('App\Techresearch','parentId','id');
    }
}
