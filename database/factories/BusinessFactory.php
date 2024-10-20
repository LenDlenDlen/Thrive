<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Business;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'user_id' => 1,
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'category' => $this->faker->randomElement(array: ['Food & Beverages', 'Services', 'Retails', 'Apparels', 'Art & Crafts', 'Games', 'Movie & Short Films']),
            'goal_amount'=>$this->faker->numberBetween(10000,10000000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Business $business) {
            // Define the available images in the folder
            $availableImages = [
                'storage/Business_image/burgers.webp',
                'storage/Business_image/pancakes.jpeg',
                'storage/Business_image/pokebowl.webp',
                'storage/Business_image/salads.jpeg'
            ];

            // Create 3 random images for the business
            \App\Models\BusinessImage::factory()->count(3)->create([
                'business_id' => $business->id,
                // Randomly select an image from the available ones
                'image_path' => $this->faker->randomElement($availableImages),
            ]);
        });
    }
}
