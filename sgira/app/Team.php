<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'year',
        'semester',
    ];

    public function students()
    {
        return $this->belongsToMany('App\User', 'students_teams', 'team_id', 'student_id');
    }
}
