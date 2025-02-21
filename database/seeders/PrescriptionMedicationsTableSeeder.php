<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrescriptionMedicationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('prescription_medications')->insert([
            [
                'prescription_id' => 1,
                'medication_id' => 1,
                'posology' => 'Take one tablet daily',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prescription_id' => 1,
                'medication_id' => 2,
                'posology' => 'Take two tablets daily',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prescription_id' => 2,
                'medication_id' => 3,
                'posology' => 'Take one tablet every 8 hours',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}