<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentcategory extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function docuemnts()
    {
        return $this->hasMany('App\Document');
    }


}
