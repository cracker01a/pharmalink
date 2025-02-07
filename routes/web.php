<?php

use App\Http\Controllers\Doctors\MedicationsController;
use App\Http\Controllers\Doctors\PatientsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.dash');
});

Route::get('/', [UserController::class, 'home'])->name('home');


Route::prefix('medication')->name('medications.')->group(function () {
    // Afficher la liste des médicaments
    Route::get('/', [MedicationsController::class, 'index'])->name('index');

    // Créer un nouveau médicament
    Route::get('/create', [MedicationsController::class, 'create'])->name('create');
    Route::post('/', [MedicationsController::class, 'store'])->name('store');

    // Éditer un médicament existant
    Route::get('/{medication}/edit', [MedicationsController::class, 'edit'])->name('edit');
    Route::put('/{medication}', [MedicationsController::class, 'update'])->name('update');

    // Supprimer un médicament
    Route::delete('/{medication}', [MedicationsController::class, 'destroy'])->name('destroy');
});


Route::prefix('patients')->name('patients.')->group(function () {
    Route::get('/', [PatientsController::class, 'index'])->name('index');
    Route::get('/create', [PatientsController::class, 'create'])->name('create');
    Route::post('/store', [PatientsController::class, 'store'])->name('store');
    Route::get('/{patient}', [PatientsController::class, 'show'])->name('show');
    Route::get('/{patient}/edit', [PatientsController::class, 'edit'])->name('edit');
    Route::put('/{patient}', [PatientsController::class, 'update'])->name('update');
    Route::delete('/{patient}', [PatientsController::class, 'destroy'])->name('destroy');
});


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
