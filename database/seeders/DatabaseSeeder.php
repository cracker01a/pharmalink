<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PatientsTableSeeder::class,
            PrescriptionsTableSeeder::class,
            OrdonnancesTableSeeder::class,
            MedicationsTableSeeder::class,
            PrescriptionMedicationsTableSeeder::class,
            DoctorsTableSeeder::class,
        ]);
    }
}
