<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_metadata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id');
            $table->string('content');
            $table->string('type');
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
        Schema::dropIfExists('location_metadata');
    }
}
