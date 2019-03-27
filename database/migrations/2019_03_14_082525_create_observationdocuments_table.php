<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservationdocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observationdocuments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document_name');
            $table->string('document_type')->nullable()->default(null);
            $table->string('document_size')->nullable()->default(null);
            $table->integer('actionplan_id')->unsigned()->index();

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
        Schema::dropIfExists('observationdocuments');
    }
}
