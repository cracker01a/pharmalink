<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('doctors')->insert([
            [
                'user_id' => 1,
                'specialite' => 'Cardiologie',
                'hopital' => 'Hopital Universitaire',
                'age' => 45,
                'adresse' => '123 Rue de la Santé, Paris',
                'annee_experience' => 20,
                'competences' => 'Spécialiste en cardiologie interventionnelle',
                'description' => 'Médecin expérimenté avec une expertise en cardiologie.',
                'photo' => 'path/to/photo1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'specialite' => 'Neurologie',
                'hopital' => 'Clinique Générale',
                'age' => 50,
                'adresse' => '456 Avenue des Champs, Lyon',
                'annee_experience' => 25,
                'competences' => 'Expert en neurologie clinique',
                'description' => 'Neurologue renommé avec une vaste expérience.',
                'photo' => 'path/to/photo2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}