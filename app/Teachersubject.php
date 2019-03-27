<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachersubject extends Model
{
    protected $table = 'teacher_subject';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
}
