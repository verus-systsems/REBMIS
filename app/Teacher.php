<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }

    public function units()
    {
        return $this->belongsToMany('App\Unit');
    }
}
