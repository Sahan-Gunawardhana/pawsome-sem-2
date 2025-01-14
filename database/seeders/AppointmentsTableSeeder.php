<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('appointments')->insert([
            [
                'customer_id' => 1,
                'pet_name' => 'Buddy',
                'pet_type' => 'Dog',
                'drop_off_date' => "2024-12-01",
                'pick_up_date' => "2024-12-05",
                'description' => 'Overnight stay and grooming. Needs extra care for separation anxiety.',
                'status' => 'upcoming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 2,
                'pet_name' => 'Milo',
                'pet_type' => 'Cat',
                'drop_off_date' => "2024-12-10",
                'pick_up_date' => "2024-12-16",
                'description' => 'Full day of playtime and socialization. Friendly with other dogs.',
                'status' => 'upcoming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 3,
                'pet_name' => 'Bella',
                'pet_type' => 'Cat',
                'drop_off_date' => "2024-12-24",
                'pick_up_date' => "2025-01-01",
                'description' => 'Morning walk and feeding. Bella has a sensitive stomach, follow specific diet instructions.',
                'status' => 'upcoming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 3,
                'pet_name' => 'Bella',
                'pet_type' => 'Dog',
                'drop_off_date' => "2025-01-04",
                'pick_up_date' => "2025-01-05",
                'description' => 'Morning walk and feeding. Bella has a sensitive stomach, follow specific diet instructions.',
                'status' => 'upcoming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 3,
                'pet_name' => 'Bella',
                'pet_type' => 'Bird',
                'drop_off_date' => "2025-02-04",
                'pick_up_date' => "2025-02-12",
                'description' => 'Morning walk and feeding. Bella has a sensitive stomach, follow specific diet instructions.',
                'status' => 'upcoming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 3,
                'pet_name' => 'Bella',
                'pet_type' => 'Other',
                'drop_off_date' => Carbon::now()->subDays(2),
                'pick_up_date' => Carbon::now()->subDay(),
                'description' => 'Morning walk and feeding. Bella has a sensitive stomach, follow specific diet instructions.',
                'status' => 'upcoming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
