<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studyfield extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function districts()
    {
        return $this->hasMany('App\Subject');
    }
}
