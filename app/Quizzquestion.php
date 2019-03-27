<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizzquestion extends Model
{
    protected $table = 'quizz_question';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function quizz()
    {
        return $this->belongsTo('App\Quizz');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
