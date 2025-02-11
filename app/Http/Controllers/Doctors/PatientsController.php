<?php

namespace App\Http\Controllers\Doctors;

use App\Models\Patient;
use http\Env\Request;

class PatientsController
{
    public function index()
    {
        $patients = Patient::all();
        return view('Doctor/patients.index');
    }

    public function create()
    {
        return view('Doctor/patients.create');
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
