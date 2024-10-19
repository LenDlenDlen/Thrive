<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([[
            'username'=> 'user123',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123123'),
            'name' => 'UserMe',
            'role' => 'donor',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]]);
    }
}
