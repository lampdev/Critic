<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'id' => 1,
            'name' => 'admin',
            'email' => 'none@gmail.com',
            'role_id' => 2,
            'password' => bcrypt('password'),
        ]);
    }
}
