<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationPaymentOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_payment_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id');
            $table->integer('payment_option_id');
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
        Schema::dropIfExists('location_payment_options');
    }
}
