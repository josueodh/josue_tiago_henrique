<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function getLevelAttribute()
    {
        if ($this->is_admin == 0) {
            return 'Aluno';
        } elseif ($this->is_admin == 1) {
            return 'Professor';
        } else {
            return 'Admin';
        }
    }

    public function teams()
    {
        return $this->belongsToMany('App\Team', 'students_teams', 'student_id', 'team_id');
    }

    public function minister()
    {
        return $this->hasMany('App\Team');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    public function bonifications()
    {
        return $this->hasMany('App\Bonification', 'student_id');
    }

    public function getIraAttribute()
    {
        $teams = Team::where('status', false)->whereHas('students', function ($query) {
            return $query->where('student_id', $this->id);
        })->get();
        $grades = $teams->map(function ($team) {
            $grade = $team->grades()->where('student_id', $this->id)->get();
            if ($grade->count() > 0) {
                return [$team->subject->credits * $grade->sum('grade') / $grade->count(), $team->subject->credits];
            } else {
                return [0, 0];
            }
        });
        if ($grades->sum('1') > 0) {
            return  $grades->sum('0') / $grades->sum('1');
        }

        return;
    }
}
