<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
