<?php

namespace App\Http\Controllers;

use App\Helpers\Tools;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // Oblige l'authentification
    }

   

    public function create()
    {
      
        return view('users.create');
    }
    public function home()
    {
        return view('layouts.dash');
    }

    public function index()
    {
        $users = User::all();

        // Passer les données à la vue
        return view('users.index', compact('users'));
    }
    public function store(Request $request)
    {
       
       
        $users = $request->user;
        $create = 0;
       // dd($request->all());

        foreach ($users as $user) {

            $firstname  = $user['firstname'] ?? null;
            $lastname  = $user['lastname'] ?? null;
            $email  = $user['email'] ?? null;
            $role  = $user['role'] ?? null;
            $is_active  = $user['is_active'] ?? null;
            // dd($role);

            if ($firstname && $lastname && $email && $role && $is_active ) {
                $create_user = User::create([
                    'firstname' => $firstname,
                    'lastname'   => $lastname,
                    'hopital'   => null,
                    'email' => $email,
                    'password' => null, 
                    'role' => $role,
                    'is_active' => $is_active,
                    
                    
                ]);

                if ($create_user) $create = $create + 1;
            }
        }
         // Si le rôle est "doctor", on crée une entrée dans la table doctors
         if ($role === 'doctor') {
            Doctor::create([
                'user_id' => $create_user->id,
                'specialite' => $user['specialite'] ?? null,
                'hopital' => $user['hopital'] ?? null,
                'age' => $user['age'] ?? null,
                'adresse' => $user['adresse'] ?? null,
                'annee_experience' => $user['annee_experience'] ?? null,
                'competences' => $user['competences'] ?? null,
                'description' => $user['description'] ?? null,
                'photo' => $user['photo'] ?? null,
            ]);
        }

        if (isset($create_user)) {
            return redirect()->route('users.index')->with(['success' => "Vous venez d'enregistrer ".$create." utilisateurs(s)."]);
        }else {
            return redirect()->back()->with(['error' => "Enregistrement echoué. Veuillez verifier vos informations saisies."]);
        }
    }
    public function destroy(string $id)
    {
        // Trouver l'utilisateur par son ID
    $user = User::findOrFail($id);

    // Supprimer l'utilisateur
    $user->delete();

    return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
}


public function edit(string $id) 
{
    // Recuperer l'utilisateur par son id 
    $user = User::findOrFail($id);

    return view('users.edit', compact('user'));
}




}
