<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = ['id', 'created_at', 'uprated_at'];

    public function teacher()
    {
        return $this->belongsTo('App\User');
    }

    public function students()
    {
        return $this->belongsToMany('App\User', 'users_subjects', 'subject_id', 'student_id');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course', 'courses_subjects', 'subject_id', 'course_id');
    }

    public function getCreditsHoursAttribute()
    {
        return $this->credits == 4 ? '60 horas' : '30 horas';
    }
}
