<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function units()
    {
        return $this->hasMany('App\Unit');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function subjects()
    {
        return $this->hasManyThrough('App\Subject', 'App\Unit');
    }

}
