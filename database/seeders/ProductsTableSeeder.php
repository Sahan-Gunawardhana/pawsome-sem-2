<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'pro_name' => 'Premium Dog Food',
                'pro_price' => 1500,
                'category' => 'dog',
                'shelf_life' => '12 months',
                'pro_description' => 'High-quality dog food packed with essential nutrients for adult dogs',
                'quantity'=> 150,
                'pro_width' => '10.5',
                'pro_height' => '15.0',
                'pro_length' => '7.0',
                'pro_image_url' => '/storage/product_images/dogfood.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'pro_name' => 'Premium  Cat Food',
                'pro_price' => 15000,
                'category' => 'cat',
                'shelf_life' => 'N/A',
                'pro_description' => 'High-quality cat food packed with essential nutrients for cats',
                'quantity'=> 100,
                'pro_width' => '12.0',
                'pro_height' => '24.0',
                'pro_length' => '12.0',
                'pro_image_url' => '/storage/product_images/catfood.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'pro_name' => 'Bird Cage',
                'pro_price' => 7500,
                'category' => 'bird',
                'shelf_life' => 'N/A',
                'pro_description' => 'Spacious and sturdy, provides a comfortable environment for your feathered friends.',
                'quantity'=> 100,
                'pro_width' => '20.0',
                'pro_height' => '30.0',
                'pro_length' => '20.0',
                'pro_image_url' => '/storage/product_images/birdcage.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
