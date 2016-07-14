<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Techresearch extends Model
{
    protected $table = 'techresearch';

    public function departmenttech()
    {
        return $this->hasMany('App\Departmenttech','parentId','id');
    }
}
