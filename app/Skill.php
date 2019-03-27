<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function questiondatabanks()
    {
        return $this->hasMany('App\Questiondatabank');
    }
}
