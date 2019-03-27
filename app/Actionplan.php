<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actionplan extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function observationdocuemnts()
    {
        return $this->hasMany('App\Observationdocument');
    }

    public function planupdates()
    {
        return $this->hasMany('App\Planupdate');
    }

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
