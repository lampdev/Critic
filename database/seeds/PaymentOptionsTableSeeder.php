<?php

use Illuminate\Database\Seeder;

class PaymentOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_options')->insert([
            'id' => 1,
            'name' => 'visa',
            'active' => 1,
        ]);
        DB::table('payment_options')->insert([
            'id' => 2,
            'name' => 'cash',
            'active' => 1,
        ]);
        DB::table('payment_options')->insert([
            'id' => 3,
            'name' => 'mastercard',
            'active' => 1,
        ]);
    }
}

