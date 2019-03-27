<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacherstudent extends Model
{
    protected $table = 'teacher_student';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
}
