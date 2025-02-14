<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{


    use HasFactory;

    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function ordonnance()
    {
        return $this->hasOne(Ordonnance::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    /**
     * Relation avec les médicaments.
     * Une prescription peut contenir plusieurs médicaments.
     */
    public function prescriptionMedication()
    {
        return $this->hasMany(PrescriptionMedication::class);
    }
    public function medications()
    {
        return $this->hasManyThrough(Medication::class, PrescriptionMedication::class);
    }
}
