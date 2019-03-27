<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function districts()
    {
        return $this->hasMany('App\District');
    }

    public function sectors()
    {
        return $this->hasManyThrough('App\Sector', 'App\District');
    }
}
