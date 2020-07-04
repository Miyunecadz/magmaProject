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
            'email' => 'magma@admin',
            'profile_img' => 'default-profile.png',
        ]);

        DB::table('users')->insert([
            'role' => 'guest',
            'username' => 'magmaguest',
            'password' => Hash::make('password'),
            'email' => 'magma@guest',
            'profile_img' => 'default-profile.png',
        ]);
    }
}
