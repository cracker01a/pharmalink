<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Lien avec la table users
            $table->string('specialite')->nullable();// Spécialité du médecin
            $table->string('hopital')->nullable(); // Hôpital d'affectation
            $table->integer('age')->nullable(); // Âge du médecin
            $table->string('adresse')->nullable(); // Adresse du médecin
            $table->integer('annee_experience')->nullable(); // Années d'expérience
            $table->text('competences')->nullable(); // Compétences spécifiques
            $table->text('description')->nullable()->nullable(); // Description optionnelle
            $table->string('photo')->nullable()->nullable(); // Photo du médecin
            $table->timestamps();
        });
         // Ajouter une contrainte pour s'assurer que seuls les users de rôle "doctor" existent dans la table "doctors"
         DB::statement("ALTER TABLE doctors ADD CONSTRAINT chk_doctor_role CHECK (user_id IN (SELECT id FROM users WHERE role = 'doctor'))");
    }

    public function down() {
        Schema::dropIfExists('doctors');
    }
};

