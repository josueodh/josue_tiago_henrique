<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'student_id',
        'date',
    ];

    public function students()
    {
        return $this->belongsToMany('App\User');
    }

}
