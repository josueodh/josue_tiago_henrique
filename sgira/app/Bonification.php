<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonification extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function student()
    {
        return $this->belongsTo('App\User');
    }
    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }
}

