<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = DB::table("users")->first();

        $business1 = DB::table('Businesses')->insertGetId([
                'user_id' => $user->id,
                'name' => 'Restaurant A',
                'description'=> 'Garang Asem Jumbo',
                'category'=> 'Food & Beverages',
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now()
            ]);


        DB::table('business_images')->insert([
            ['business_id' => $business1, 'image_path' => 'business_photos/wine.jpeg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
