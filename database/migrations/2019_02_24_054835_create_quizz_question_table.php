<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizz_question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quizz_id')->unsigned()->index();
            $table->integer('question_id')->unsigned()->index();

            $table->foreign('quizz_id')->references('id')->on('quizzes');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizz_question');
    }
}
