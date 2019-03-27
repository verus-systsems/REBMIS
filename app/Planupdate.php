<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planupdate extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function actionplan()
    {
        return $this->belongsTo('App\Actionplan');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }
}
