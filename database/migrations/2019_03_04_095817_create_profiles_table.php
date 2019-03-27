<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avatar')->nullable()->default(null);
            $table->text('bio_data')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('mobile_number')->nullable()->default(null);
            $table->string('gender')->nullable()->default(null);
            $table->date('date_of_birth')->nullable();
            $table->integer('user_id')->unsigned()->index();

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
        Schema::dropIfExists('profiles');
    }
}
