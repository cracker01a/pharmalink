<?php

namespace App\Http\Controllers\Doctors;

use App\Models\Ordonnance;
use App\Models\Patient;
use http\Env\Request;

class PatientsController
{
    public function index()
    {
        $ordonnances = Ordonnance::with(['prescription', 'prescription.doctor', 'prescription.patient', 'prescriptionMedication'])->get();
        $patients = Patient::with(['prescription.ordonnance'])->get();


        // Logique pour récupérer les ordonnances du patient
        $prescriptions = $patients->last()->prescription;
        $ordonnances = collect();
        foreach ($prescriptions as $prescription) {
            $ordonnances->push($prescription->ordonnance);
        }
        return view('Doctor/patients.index', compact('ordonnances', 'patients'));

    }

    public function create()
    {
        return view('Doctor/patients.create');
    }

    public function ordonnancesList(Patient $patient)
    {
        // Utilisation de la relation chargée pour récupérer les ordonnances
        $patient->load('prescription.ordonnance');

        // Vérifiez si le patient a des prescriptions
        if ($patient->prescription->isEmpty()) {
            return response()->json(['html' => '<p>Aucune ordonnance trouvée pour ce patient.</p>']);
        }

        // Récupérez toutes les ordonnances des prescriptions du patient
        $ordonnances = $patient->prescription->pluck('ordonnance')->flatten();
        // Générer le HTML à retourner
        $html = view('Doctor/Patients/patient_ordonnances_list', compact('ordonnances'))->render();

        return response()->json(['html' => $html]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required|date',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:patients,email',
            'phone_number' => 'required'
        ]);

        $patient = Patient::create($validatedData);

        return redirect()->back()->with('success', 'Patient enregistré avec succès');
    }

    public function show(Patient $patient)
    {
        return view('Doctor/patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('Doctor/patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required|date',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:patients,email',
            'phone_number' => 'required'
        ]);

        $patient->update($validatedData);

        return redirect()->back()->with('success', ' Infomration du Patient modifie avec success');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
    }


}
