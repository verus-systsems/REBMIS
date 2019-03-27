<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function choices()
    {
        return $this->hasMany('App\Choice');
    }

}
