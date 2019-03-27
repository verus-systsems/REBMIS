<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function choice()
    {
        return $this->belongsTo('App\Choice');
    }
}
