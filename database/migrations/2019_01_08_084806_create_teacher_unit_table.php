<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_unit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned()->index();
            $table->integer('unit_id')->unsigned()->index();

            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('unit_id')->references('id')->on('units');
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
        Schema::dropIfExists('teacher_unit');
    }
}
