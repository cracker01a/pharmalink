<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('medications')->insert([
            [
                'name' => 'Aspirin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ibuprofen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paracetamol',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}