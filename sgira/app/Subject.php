<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = ['id', 'created_at', 'uprated_at'];

    public function courses()
    {
        return $this->belongsToMany('App\Course', 'courses_subjects', 'subject_id', 'course_id');
    }

    public function getCreditsHoursAttribute()
    {
        return $this->credits == 4 ? '60 horas' : '30 horas';
    }

    public function teams()
    {
        return $this->hasMany('App\Team');
    }

    public function getbonusAttribute()
    {
        $teams = $this->teams;
        $bonus  = 0;
        $total_bonus = 0;
        foreach ($teams as $team) {
            if ($team->bonus) {
                $total_bonus++;
                $bonus += $team->value;
            }
        }

        if ($total_bonus > 0) {
            return number_format($bonus / $total_bonus, 1);
        }

        return 0;
    }
}
