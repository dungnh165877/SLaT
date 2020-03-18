<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	public $timestamps = false;

	protected $fillable = [
        'name', 'course_code','category_id'
    ];

	public function coursecategory()
    {
        return $this->hasOne('App\CourseCategory');
    }
}
