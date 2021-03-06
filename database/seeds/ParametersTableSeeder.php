<?php

use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parameters')->insert([
            'id' => 1,
            'name' => 'business-pricing',
            'type' => 'integer',
            'created_at' => '2018-02-15 15:56:10',
            'updated_at' => '2018-02-15 15:56:10',
            'active' => 1,
            'created_user_id' => 1,
            'updated_user_id' => 1,
        ]);
        DB::table('parameters')->insert([
            'id' => 2,
            'name' => 'business-website',
            'type' => 'string',
            'created_at' => '2018-02-15 15:56:10',
            'updated_at' => '2018-02-15 15:56:10',
            'active' => 1,
            'created_user_id' => 1,
            'updated_user_id' => 1,
        ]);
        DB::table('parameters')->insert([
            'id' => 3,
            'name' => 'business-gluten-free',
            'type' => 'bool',
            'created_at' => '2018-02-15 15:56:10',
            'updated_at' => '2018-02-15 15:56:10',
            'active' => 1,
            'created_user_id' => 1,
            'updated_user_id' => 1,
        ]);
        DB::table('parameters')->insert([
            'id' => 4,
            'name' => 'business-gf-description',
            'type' => 'string',
            'created_at' => '2018-02-15 15:56:10',
            'updated_at' => '2018-02-15 15:56:10',
            'active' => 1,
            'created_user_id' => 1,
            'updated_user_id' => 1,
        ]);
    }
}
