<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestiondatabanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questiondatabanks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->text('question');
            $table->text('answer');
            $table->string('results')->nullable()->default(null);
            $table->text('guide')->nullable()->default(null);
            $table->text('multimedia')->nullable()->default(null);
            $table->integer('grade_id')->unsigned()->index();
            $table->integer('subject_id')->unsigned()->index();
            $table->integer('unit_id')->unsigned()->index();
            $table->integer('skill_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('hits')->nullable()->default(null);
            $table->string('downloads')->nullable()->default(null);
            $table->integer('approved')->default(0);

            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('skill_id')->references('id')->on('skills');
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
        Schema::dropIfExists('questiondatabanks');
    }
}
