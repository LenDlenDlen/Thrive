<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use App\Models\Business;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     // 'username' => 'user123',
        //     'name' => 'UserMe',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        $this->call(BusinessSeeder::class);
        
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Post::factory(10)->create();
        Comment::factory(10)->create();
    }
}
