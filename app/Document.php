<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function documentcategory()
    {
        return $this->belongsTo('App\Documentcategory');
    }
}
