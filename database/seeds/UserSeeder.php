<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => 'admin',
            'username' => 'magmaadmin',
            'password' => Hash::make('password'),
            'email' => 'magmaadmin@test.com',
            'profile_img' => '',
        ]);

        DB::table('users')->insert([
            'role' => 'guest',
            'username' => 'magmaguest',
            'password' => Hash::make('password'),
            'email' => 'magmaguest@test.com',
            'profile_img' => '',
        ]);
    }
}
