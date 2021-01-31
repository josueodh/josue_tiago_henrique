<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends User
{
    protected $fillable = [
        'name', 'numeroMatricula', 'curso', 'status', 'ira',
    ];
}
