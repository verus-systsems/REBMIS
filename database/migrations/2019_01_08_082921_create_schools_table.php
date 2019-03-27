<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_name');
            $table->string('unique_identifier');
            $table->integer('sector_id')->unsigned()->index();
            $table->string('address')->nullable()->default(null);
            $table->string('postal_code')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('telephone');
            $table->string('email')->nullable()->default(null);
            $table->string('contact_name')->nullable()->default(null);
            $table->string('contact_telephone')->nullable()->default(null);
            $table->string('contact_email')->nullable()->default(null);
            $table->string('lat')->nullable()->default(null);
            $table->string('long')->nullable()->default(null);
            $table->integer('type')->default(0);
            $table->foreign('sector_id')->references('id')->on('sectors');
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
        Schema::dropIfExists('schools');
    }
}
