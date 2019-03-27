<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unit_name');
            $table->integer('subject_id')->unsigned()->index();
            $table->string('number_of_periods');
            $table->text('kuc')->nullable()->default(null);
            $table->text('ac')->nullable()->default(null);
            $table->text('standard')->nullable()->default(null);
            $table->integer('unit_level');
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
        Schema::dropIfExists('units');
    }
}
