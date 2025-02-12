<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Afficher toutes les prescriptions.
     */

    /**
     * Enregistrer une nouvelle prescription.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'prescription_code' => 'required|string|unique:prescriptions,prescription_code'
        ]);

        $prescription = Prescription::create($validated);

        return response()->json($prescription, 201);
    }

    /**
     * Afficher une prescription spécifique.
     */
    public function show(Prescription $prescription)
    {
        return response()->json($prescription->load(['patient', 'doctor']));
    }

    /**
     * Mettre à jour une prescription.
     */
    public function update(Request $request, Prescription $prescription)
    {
        $validated = $request->validate([
            'patient_id' => 'sometimes|exists:patients,id',
            'doctor_id' => 'sometimes|exists:doctors,id',
            'prescription_code' => 'sometimes|string|unique:prescriptions,prescription_code,' . $prescription->id
        ]);

        $prescription->update($validated);

        return response()->json($prescription);
    }

    /**
     * Supprimer une prescription.
     */
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();

        return response()->json(['message' => 'Prescription supprimée avec succès.']);
    }
}
