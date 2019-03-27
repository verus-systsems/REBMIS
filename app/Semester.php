<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function quizzes()
    {
        return $this->hasMany('App\Quiz');
    }

    public function actionplans()
    {
        return $this->hasMany('App\Actionplan');
    }

    public function planupdates()
    {
        return $this->hasMany('App\Planupdate');
    }
}
