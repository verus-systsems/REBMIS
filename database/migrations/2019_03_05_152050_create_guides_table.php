<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('decription')->nullable()->default(null);
            $table->string('document_name')->nullable()->default(null);
            $table->string('document_type')->nullable()->default(null);
            $table->string('document_size')->nullable()->default(null);
            $table->integer('grade_id')->unsigned()->index();
            $table->integer('subject_id')->unsigned()->index();
            $table->integer('unit_id')->unsigned()->index();
            $table->integer('type');

            $table->integer('user_id')->unsigned()->index();

            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('unit_id')->references('id')->on('units');
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
        Schema::dropIfExists('guides');
    }
}
