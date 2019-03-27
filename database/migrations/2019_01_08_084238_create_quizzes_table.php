<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('quiz_name');
            $table->string('quiz_hour');
            $table->string('quiz_minutes');
            $table->string('quiz_seconds');
            $table->integer('subject_id')->unsigned()->index();
            $table->integer('unit_id')->unsigned()->index();
            $table->integer('semester_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('quizzes');
    }
}
