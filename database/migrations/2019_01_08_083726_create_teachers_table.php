<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('service_number');
            $table->string('address')->nullable()->default(null);
            $table->string('postal_code')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('telephone');
            $table->string('email')->nullable()->default(null);
            $table->string('highest_qualification');
            $table->string('photo')->nullable()->default(null);
            $table->integer('school_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('school_id')->references('id')->on('schools');
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
        Schema::dropIfExists('teachers');
    }
}
