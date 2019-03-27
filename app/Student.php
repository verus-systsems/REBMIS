<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function units()
    {
        return $this->belongsToMany('App\Unit');
    }
}
