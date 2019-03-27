<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanupdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planupdates', function (Blueprint $table) {
            $table->increments('id');
            $table->text('status');
            $table->string('rating');
            $table->date('status_date');
            $table->string('status_month');
            $table->string('status_year');
            $table->integer('student_id')->unsigned()->index();
            $table->integer('actionplan_id')->unsigned()->index();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('actionplan_id')->references('id')->on('actionplans');
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
        Schema::dropIfExists('planupdates');
    }
}
