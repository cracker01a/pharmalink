<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Doctor;

class AuthController extends Controller
{
    // Vérifier si l'email existe et si le mot de passe est NULL
    public function checkEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Email non trouvé.'], 404);
        }

        return response()->json([
            'status' => 'success',
            'password_is_null' => is_null($user->password),
        ]);
    }

    // Gérer la connexion et l'enregistrement du mot de passe si nécessaire
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email non trouvé.']);
        }

       

        // Incrémenter les tentatives de connexion
        $attempts = $request->session()->get('login_attempts', 0) + 1;
        $request->session()->put('login_attempts', $attempts);

        if ($attempts >= 5) {
            return back()->withErrors(['email' => 'Trop de tentatives. Réessayez plus tard.']);
        }
         // Vérifier si l'utilisateur est un doctor
         if ($user->role === 'doctor') {
            $doctor = Doctor::where('user_id', $user->id)->first();

            // Vérifier si des champs obligatoires sont NULL
            if ($doctor && (is_null($doctor->specialite) || is_null($doctor->hopital) || is_null($doctor->age) || 
                            is_null($doctor->adresse) || is_null($doctor->annee_experience) || 
                            is_null($doctor->competences) || is_null($doctor->description) || is_null($doctor->photo))) {
                
                // Stocker une variable de session pour afficher le popup
                session(['show_popup' => true]);
            }
        }

        if (is_null($user->password)) {
            // Vérifier que les mots de passe correspondent
            if ($request->password !== $request->confirm_password) {
                return back()->withErrors(['confirm_password' => 'Les mots de passe ne correspondent pas.']);
            }

            // Définir le mot de passe
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::login($user);

            return redirect()->route('home')->with('success', 'Mot de passe défini avec succès.');
        } else {
            // Authentification normale
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home');
            }

            return back()->withErrors(['password' => 'Mot de passe incorrect.']);
        }
    }

    public function log(){
        return view('auth.login');
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Déconnecte l'utilisateur

        $request->session()->invalidate(); // Invalide la session
        $request->session()->regenerateToken(); // Régénère le token CSRF

        return redirect('/login')->with('success', 'Vous êtes déconnecté.');
    }

}