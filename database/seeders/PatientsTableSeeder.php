<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('patients')->insert([
            [
                'firstname' => 'Alice',
                'lastname' => 'Johnson',
                'email' => 'alice.johnson@example.com',
                'phone_number' => '1234567890',
                'gender' => 'female',
                'job' => 'Engineer',
                'date_of_birth' => '1985-05-15',
                'address' => '123 Main St, Anytown, USA',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Bob',
                'lastname' => 'Smith',
                'email' => 'bob.smith@example.com',
                'phone_number' => '0987654321',
                'gender' => 'male',
                'job' => 'Teacher',
                'date_of_birth' => '1978-11-23',
                'address' => '456 Elm St, Othertown, USA',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}