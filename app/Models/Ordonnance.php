<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prescriptionMedication()
    {
        return $this->belongsTo(PrescriptionMedication::class);
    }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }

    /**
     * Relation avec le docteur (via Prescription).
     */
    public function doctor()
    {
        return $this->hasOneThrough(User::class, Prescription::class, 'id', 'id', 'prescription_medication_id', 'doctor_id');
    }
}
