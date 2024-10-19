<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Business;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // $this->call(UserSeeder::class);

        // Business::create([
        //     'name' => 'Sample Business',
        //     'description' => 'This is a sample business.',
        //     'category' => 'Food & Beverages',
        //     'image' => 'images/businesses/sample-image.jpg', // Image path
        // ]);
    }
}
