<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function bonifications()
    {
        return $this->hasMany('App\Bonification');
    }
}
