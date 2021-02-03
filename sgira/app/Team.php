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
}
