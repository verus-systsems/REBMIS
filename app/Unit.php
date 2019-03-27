<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function topics()
    {
        return $this->belongsTo('App\Topic');
    }


}
