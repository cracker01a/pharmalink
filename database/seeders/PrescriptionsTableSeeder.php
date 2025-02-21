<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrescriptionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('prescriptions')->insert([
            [
                'patient_id' => 1,
                'doctor_id' => 1,
                'disease' => 'Hypertension',
                'prescription_code' => 'RX123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'patient_id' => 2,
                'doctor_id' => 2,
                'disease' => 'Diabetes',
                'prescription_code' => 'RX654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}