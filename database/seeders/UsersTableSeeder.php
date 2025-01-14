<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@mail.com',
                'password' => Hash::make('password'),
                'user_type' => 'admin',
                'created_at' => '2024-01-01 00:00:00',
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@mail.com',
                'password' => Hash::make('password'),
                'user_type' => 'user',
                'created_at' => '2024-11-01 00:00:00',
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alicejohnson@mail.com',
                'password' => Hash::make('password'),
                'user_type' => 'user',
                'created_at' => '2024-08-01 00:00:00',
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson II',
                'email' => 'alicejohnsonII@mail.com',
                'password' => Hash::make('password'),
                'user_type' => 'user',
                'created_at' => '2024-08-01 00:00:00',
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson III',
                'email' => 'alicejohnsonIII@mail.com',
                'password' => Hash::make('password'),
                'user_type' => 'user',
                'created_at' => '2024-09-03 00:00:00',
                'updated_at' => now(),
            ],
        ]);
    }
}
