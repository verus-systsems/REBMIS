<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questiondatabank extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function skill()
    {
        return $this->belongsTo('App\Skill');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function tools()
    {
        return $this->hasMany('App\Tool');
    }
}
