<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('semester_id')->unsigned()->index();
            $table->integer('student_id')->unsigned()->index();
            $table->integer('subject_id')->unsigned()->index();
            $table->string('score');
            $table->string('out_of');
            $table->string('percentage');
            $table->integer('is_cat')->default(0);

            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('subject_id')->references('id')->on('subjects');
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
        Schema::dropIfExists('results');
    }
}
