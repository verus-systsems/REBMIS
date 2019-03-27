<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function province()
    {
        return $this->belongsTo('App\Province');
    }
}
