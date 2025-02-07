<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
        return view('users.index');
    }

    public function store(Request $request)
    {

        $users = $request->user;
        $create = 0;

        foreach ($users as $user) {

            $firstname = $user['firstname'] ?? null;
            $lastname = $user['lastname'] ?? null;
            $email = $user['email'] ?? null;
            $role = $user['role'] ?? null;
            $is_active = $user['is_active'] ?? null;


            if ($firstname && $lastname && $email && $role && $isActive && $site_id) {
                $create_user = User::create([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'hospital' => null,
                    'email' => $email,
                    'password' => null,
                    'role' => $role,
                    'is_active' => $is_active,


                ]);

                if ($create_user) $create = $create + 1;
            }
        }

        if (isset($create_user)) {
            return redirect()->route('users.index')->with(['success' => "Vous venez d'enregistrer " . $create . " utilisateurs(s)."]);
        } else {
            return redirect()->back()->with(['error' => "Enregistrement echoué. Veuillez verifier vos informations saisies."]);
        }
    }

}
