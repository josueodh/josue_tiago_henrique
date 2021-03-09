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

    public function getAverageIraAttribute()
    {
        $students = $this->students;
        $total = $students->filter(function ($student) {
            return $student->ira != null;
        })->count();

        if ($total > 0) {
            return $students->sum('ira') / $total;
        }

        return 0;
    }

    public function getBonusAttribute()
    {
        $total = 0;
        foreach ($this->students as $student) {
            $total += $student->bonifications()->count();
        }

        return $total;
    }
    public function getTop1Attribute()
    {
        $students = $this->students()->get();
        $total_students = [];
        foreach ($students as $student) {
            $student->ira = $student->ira;
            array_push($total_students, $student);
        }
        return collect($total_students)->sortByDesc('ira')->first();
    }

    public function getTop2Attribute()
    {
        $students = $this->students()->get();
        $total_students = [];
        foreach ($students as $student) {
            $student->ira = $student->ira;
            array_push($total_students, $student);
        }
        if (collect($total_students)->count() < 2) {
            return;
        }
        return collect($total_students)->sortByDesc('ira')->shift()->first();
    }

    public function getTop3Attribute()
    {
        $students = $this->students()->get();
        $total_students = [];
        foreach ($students as $student) {
            $student->ira = $student->ira;
            array_push($total_students, $student);
        }
        if (collect($total_students)->count() < 3) {
            return;
        }

        return collect($total_students)->sortByDesc('ira')->shift()->shift()->first();
    }
}
