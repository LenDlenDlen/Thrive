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
        $business1 = DB::table('Businesses')->insertGetId([
                'name' => 'Restaurant A',
                'description'=> 'Garang Asem Jumbo',
                'category'=> 'Food & Beverages',
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now()
            ]);


        DB::table('Business_images')->insert([
            ['business_id' => $business1, 'image_path' => 'storage/Vusiness_image/wine.jpeg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
