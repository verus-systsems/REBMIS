<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacherunit extends Model
{
    protected $table = 'teacher_unit';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
}
