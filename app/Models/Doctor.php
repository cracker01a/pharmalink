<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id', 'specialite', 'hopital', 'age', 'adresse',
        'annee_experience', 'competences', 'description', 'photo'
    ];

    // Relation avec User
    public function user() {
        return $this->belongsTo(User::class);
    }
}
    