<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function teacher()
    {
        return $this->belongsTo('App\User');
    }

    public function students()
    {
        return $this->belongsToMany('App\User', 'students_teams', 'team_id', 'student_id');
    }

    public function getYearAndSemesterAttribute()
    {
        return $this->year . '.' . $this->semester;
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    public function getApprovedAttribute()
    {
        $approved = 0;
        $students = $this->grades()->get()->unique('student_id')->pluck('student_id');
        foreach ($students as $student) {
            $total_student = $this->grades()->where('student_id', $student)->get();
            if ($total_student->count() > 0) {
                if (($total_student->sum('grade') / $total_student->count()) >= 60) {
                    $approved++;
                }
            }
        }
        return $approved;
    }

    public function getDisapprovedAttribute()
    {
        $disapproved = 0;
        $students = $this->grades()->get()->unique('student_id')->pluck('student_id');
        foreach ($students as $student) {
            $total_student = $this->grades()->where('student_id', $student)->get();
            if ($total_student->count() > 0) {
                if (($total_student->sum('grade') / $total_student->count()) < 60) {
                    $disapproved++;
                }
            }
        }
        return $disapproved;
    }

    public function getBonusStudentsAttribute()
    {
        $receive = [];
        $students = $this->students()->get();
        foreach ($students as $student) {
            $total_student = $this->grades()->where('student_id', $student->id)->get();
            if ($total_student->count() > 0) {
                if (($total_student->sum('grade') / $total_student->count()) >= $this->value) {
                    $student->total_grade = $total_student->sum('grade') / $total_student->count();
                    array_push($receive, $student);
                }
            }
        }
        return $receive;
    }


    public function getNoBonusStudentsAttribute()
    {
        $not_receive = [];
        $students = $this->students()->get();
        foreach ($students as $student) {
            $total_student = $this->grades()->where('student_id', $student->id)->get();
            if ($total_student->count() > 0) {
                if (($total_student->sum('grade') / $total_student->count()) < $this->value) {
                    $student->total_grade = $total_student->sum('grade') / $total_student->count();
                    array_push($not_receive, $student);
                }
            }
        }
        return $not_receive;
    }
}
