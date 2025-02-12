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

    /**
     * Relation avec les médicaments.
     * Une prescription peut contenir plusieurs médicaments.
     */
    public function medications()
    {
        return $this->hasMany(Medication::class, 'medication_id');
    }
}
