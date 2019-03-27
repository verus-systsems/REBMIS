<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
