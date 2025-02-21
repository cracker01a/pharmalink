<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdonnancesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ordonnances')->insert([
            [
                'prescription_id' => 1,
                'code' => 'ORD123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prescription_id' => 2,
                'code' => 'ORD654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}