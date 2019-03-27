<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }
}
