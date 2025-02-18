<?php

namespace App\Http\Controllers\Doctors;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


use App\Http\Controllers\Controller; 


class ProfileDoctorController extends Controller
{
    public function index(){
        $user = Auth::user();  // Récupérer l'utilisateur authentifié
        // $doctor = Doctor::all();
        // Assurer que l'utilisateur est bien authentifié avant de continuer
        if (!$user) {
            // Si l'utilisateur n'est pas authentifié, gérer l'erreur ou rediriger
            return redirect()->route('login');
        }
    
        $doctor = Doctor::where('user_id', auth()->id())->first();// Utiliser l'ID de l'utilisateur pour rechercher le médecin
    
        // dd($doctor);  // Vérifier les données récupérées
    
        return view('Doctor.profile.profile', compact('doctor'));
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);
    
        if (!$doctor) {
            return redirect()->back()->with('error', 'Médecin introuvable');
        }
        // dd($doctor);
        return view('Doctor.profile.profile', compact('doctor'));
    }
    

    public function update(Request $request)
{
    $user = Auth::user();

    if ($user->role !== 'doctor') {
        return back()->with('error', 'Seuls les médecins peuvent modifier ces informations.');
    }

    // Validation des données
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'specialite' => 'required|string|max:255',
        'hopital' => 'nullable|string|max:255',
        'age' => 'nullable|integer|min:18',
        'adresse' => 'nullable|string|max:255',
        'annee_experience' => 'nullable|integer|min:0',
        'competences' => 'nullable|string',
        'description' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Mettre à jour les infos de l'utilisateur (nom, prénom)
    $user->update([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
    ]);

    // Vérifier si le doctor existe déjà
    $doctor = Doctor::firstOrNew(['user_id' => $user->id]);

    $doctor->specialite = $request->specialite;
    $doctor->hopital = $request->hopital;
    $doctor->age = $request->age;
    $doctor->adresse = $request->adresse;
    $doctor->annee_experience = $request->annee_experience;
    $doctor->competences = $request->competences;
    $doctor->description = $request->description;

    // Gérer l'upload de la photo
    if ($request->hasFile('photo')) {
        if ($doctor->photo) {
            Storage::delete($doctor->photo); // Supprimer l'ancienne photo
        }
        $doctor->photo = $request->file('photo')->store('doctors');
    }

    $doctor->save();

    return back()->with('success', 'Informations mises à jour avec succès.');
}

}
