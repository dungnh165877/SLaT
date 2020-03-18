<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    public $timestamps = false;

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
