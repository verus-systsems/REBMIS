<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document_name');
            $table->string('document_type')->nullable()->default(null);
            $table->string('document_size')->nullable()->default(null);
            $table->integer('questiondatabank_id')->unsigned()->index();

            $table->foreign('questiondatabank_id')->references('id')->on('questiondatabanks');
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
        Schema::dropIfExists('tools');
    }
}
