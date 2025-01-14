<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('boxes')->insert([
            [
                'customer_id' => 2, 
                'subscription_type' => 'monthly',
                'status' => true,
                'price' => 49.99,
                'created_at' => '2024-01-01 00:00:00',
                'updated_at' => now(),
            ],
            [
                'customer_id' => 3, 
                'subscription_type' => 'monthly',
                'status' => true,
                'price' => 49.99,
                'created_at' => '2024-02-01 00:00:00',
                'updated_at' => now(),
            ],
            [
                'customer_id' => 4, 
                'subscription_type' => 'monthly',
                'status' => true,
                'price' => 49.99,
                'created_at' =>'2024-02-01 00:00:00',
                'updated_at' => now(),
            ],
            [
                'customer_id' => 5, 
                'subscription_type' => 'monthly',
                'status' => true,
                'price' => 49.99,
                'created_at' => '2024-08-01 00:00:00',
                'updated_at' => now(),
            ],
        ]);
    }
}
