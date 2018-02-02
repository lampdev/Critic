<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_specialties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id');
            $table->integer('specialty_id');
            $table->timestamps();
            $table->boolean('active');
            $table->integer('created_user_id');
            $table->integer('updated_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_specialties');
    }
}
