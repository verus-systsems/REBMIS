<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function schools()
    {
        return $this->hasMany('App\School');
    }
}
