<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observationdocument extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function actionplan()
    {
        return $this->belongsTo('App\Actionplan');
    }
}
