<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\User;

class DoctorSeeder extends Seeder {
    public function run() {
        $user = User::where('email', 'doctor@example.com')->first(); // Change l'email selon ton user

        if ($user) {
            Doctor::create([
                'user_id' => $user->id,
                'specialite' => 'Cardiologue',
                'hopital' => 'Hôpital Général',
                'age' => 45,
                'adresse' => '123 Rue des Médecins',
                'annee_experience' => 20,
                'competences' => 'Chirurgie cardiaque, soins intensifs',
                'description' => 'Expert en cardiologie depuis 20 ans.',
                'photo' => 'doctor1.jpg',
            ]);
        }
    }
}
