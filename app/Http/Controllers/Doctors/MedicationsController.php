<?php

namespace App\Http\Controllers\Doctors;

use App\Models\Medication;
use http\Env\Request;
use Illuminate\Http\RedirectResponse;

class MedicationsController
{
    public function index()
    {
        $medications = Medication::all();
        return view('Doctor/medications/index', compact('medications'));
    }

    public function create()
    {
        return view('Doctor/medications/create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'dosage' => 'required',
        ]);

        $medication = Medication::create($validatedData);

        return redirect()->route('medications.index')->with('success', 'Medication created successfully.');
    }

    public function edit(Medication $medication)
    {
        return view('Doctor/medications.edit', compact('medication'));
    }


    public function update(Request $request, Medication $medication)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'dosage' => 'required',
        ]);

        $medication->update($validatedData);

        return redirect()->route('medications.index')->with('success', 'Medication updated successfully.');
    }

    public function destroy(Medication $medication)
    {
        $medication->delete();

        return redirect()->route('medications.index')->with('success', 'Medication deleted successfully.');
    }


}
