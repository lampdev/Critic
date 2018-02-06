<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationParameterValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_parameter_value', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id');
            $table->integer('parameter_id');
            $table->string('value');
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
        Schema::dropIfExists('location_parameter_value');
    }
}
