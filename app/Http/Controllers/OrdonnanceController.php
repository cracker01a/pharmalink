<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdonnanceController extends Controller
{
    public function index()
    {
        
        return view('Ordonnance.index');
    }

    public function create()
    {
        return view('Ordonnance.create');
    }
}
