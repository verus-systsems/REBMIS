<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentsubject extends Model
{
    protected $table = 'student_subject';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
