<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([[
            'username' => 'UserMe',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123123'),
            'role' => 'donor',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]]);
    }
}
