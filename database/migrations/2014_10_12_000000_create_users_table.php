<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('hopital')->nullable();;
            $table->string('email')->unique();
            $table->string('password')->nullable();;
            $table->enum('role', ['doctor', 'admin'])->default('doctor');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

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


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
