<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function studyfield()
    {
        return $this->belongsTo('App\Studyfield');
    }

    public function units()
    {
        return $this->hasMany('App\Unit');
    }

    public function questions()
    {
        return $this->hasManyThrough('App\Question', 'App\Topic');
    }
}
