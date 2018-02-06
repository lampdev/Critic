<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id');
            $table->integer('neighborhood_id');
            $table->integer('google_place_id');
            $table->float('latitude');
            $table->float('longitude');
            $table->string('street1');
            $table->string('street2');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->timestamps();
            $table->boolean('active');
            $table->integer('created_user_id')->default(1);
            $table->integer('updated_user_id')->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
