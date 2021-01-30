<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends User
{
    protected $fillable = [
        'numeroSIAPE'
    ];
}
