<?php

namespace App\Http\Controllers\Doctors;

use App\Models\Medication;
use App\Models\Ordonnance;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdonnanceController
{
    /**
     * Afficher toutes les ordonnances.
     */
    public function index()
    {
        return response()->json(Ordonnance::with(['doctor', 'patient', 'prescription'])->get());
    }

    /**
     * Enregistrer une nouvelle ordonnance.
     */

    public function create()
    {
        return view('Doctor.Ordonnance.create');
    }

    public function store(Request $request)
    {


        // Récupération des données envoyées
        $data = $request->all();

        $patientData = $data['serviceData'];
        $medicationsData = $data['timeData'];

        $medicationsValidatedData = Validator::make($medicationsData, [
            '*.medication' => 'nullable|string|max:255', // Chaque objet peut avoir 'medication' qui est une chaîne
            '*.posologie' => 'nullable|string|max:255', // Chaque objet peut avoir 'posologie' qui est une chaîne
        ])->validate();


        // Validation des données principales
        $PatientValidatedData = Validator::make($patientData, [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|email|unique:patients,email',
            'phoneNumber' => 'nullable|string|max:20',
            'place' => 'required|string|max:255',
        ])->validate();




        $patient = Patient::firstOrCreate([
            'email' => $patientData['email'],
            'phone_number' => $patientData['phoneNumber'],
            'firstname' => $patientData['firstName'],
            'lastname' => $patientData['lastName'],
        ], [
            'date_of_birth' => $patientData['birthdate'],
            'address' => $patientData['place'],
        ]);


        // Enregistrement des médicaments s'il y en a
        if (!empty($medicationsData)) {
            // Parcours des paires médication et posologie
            for ($i = 0; $i < count($medicationsData); $i++) {
                $medication = $medicationsData[$i]['medication'] ?? null;
                $posology = $medicationsData[$i]['posologie'] ?? null;

                // Vérifier si le médicament est non vide et si une posologie existe
                if (!empty($medication)) {
                    $medication = Medication::create([
                        'name' => $medication,
                        'posology' => $posology, // Posologie est facultative
                    ]);

                }
            }
        }




        return response()->json(['message' => 'Patient et ordonnances enregistrés avec succès !'], 201);
    }


    /**
     * Afficher une ordonnance spécifique.
     */
    public function show(Ordonnance $ordonnance)
    {
        return response()->json($ordonnance->load(['doctor', 'patient', 'prescription']));
    }

    /**
     * Mettre à jour une ordonnance.
     */
    public function update(Request $request, Ordonnance $ordonnance)
    {
        $validated = $request->validate([
            'doctor_id' => 'sometimes|exists:doctors,id',
            'patient_id' => 'sometimes|exists:patients,id',
            'prescription_id' => 'sometimes|exists:prescriptions,id'
        ]);

        $ordonnance->update($validated);

        return response()->json($ordonnance);
    }

    /**
     * Supprimer une ordonnance.
     */
    public function destroy(Ordonnance $ordonnance)
    {
        $ordonnance->delete();

        return response()->json(['message' => 'Ordonnance supprimée avec succès.']);
    }
}
