<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardianstudent extends Model
{
    protected $table = 'guardian_student';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function guardian()
    {
        return $this->belongsTo('App\Guardian');
    }

    public function Student()
    {
        return $this->belongsTo('App\Student');
    }
}
