<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentunit extends Model
{
    protected $table = 'student_unit';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
