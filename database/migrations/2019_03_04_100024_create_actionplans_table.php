<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actionplans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grade_id')->unsigned()->index();
            $table->integer('subject_id')->unsigned()->index();
            $table->integer('unit_id')->unsigned()->index();
            $table->integer('student_id')->unsigned()->index();
            $table->string('rating');
            $table->text('observations');
            $table->date('observation_date');
            $table->string('observation_month');
            $table->string('observation_year');
            $table->text('action_plan');
            $table->date('plan_start_date');
            $table->date('plan_end_date');
            $table->integer('semester_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();


            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('student_id')->references('id')->on('students');
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
        Schema::dropIfExists('actionplans');
    }
}
