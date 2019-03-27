<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_name');
            $table->string('unique_identifier')->nullable()->default(null);
            $table->date('date_of_birth');
            $table->integer('gender');
            $table->string('nationality');
            $table->string('photo')->nullable()->default(null);
            $table->integer('school_id')->unsigned()->index();
            $table->integer('grade_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('grade_id')->references('id')->on('grades');
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
        Schema::dropIfExists('students');
    }
}
