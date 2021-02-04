<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function subjects()
    {
        return $this->belongsToMany('App\Subject', 'courses_subjects', 'course_id', 'subject_id');
    }

    public function students()
    {
        return $this->hasMany('App\User');
    }


    public function getTotalGraduateAttribute()
    {
        return $this->students->where('status', 1)->count();
    }
}
