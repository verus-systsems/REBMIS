<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function questiondatabank()
    {
        return $this->belongsTo('App\Questiondatabank');
    }
}
