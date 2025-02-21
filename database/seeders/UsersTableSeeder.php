<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'hopital' => 'Hopital Universitaire',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'role' => 'doctor',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Jane',
                'lastname' => 'Smith',
                'hopital' => 'Clinique Générale',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}