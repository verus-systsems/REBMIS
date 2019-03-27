<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}


