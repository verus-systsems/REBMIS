<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
