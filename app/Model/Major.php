<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
