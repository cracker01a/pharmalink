<?php

use App\Http\Controllers\Doctors\MedicationsController;
use App\Http\Controllers\previewController;

use App\Http\Controllers\Doctors\PatientsController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\Doctors\ProfileDoctorController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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


    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile')

// Route::get('/dash', [UserController::class, 'home'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/dash', [UserController::class, 'home'])->name('home');
    Route::get('/', [UserController::class, 'home1']);
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});



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

Route::delete('/users/{id}',[UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}',[UserController::class, 'update'])->name('users.update');

Route::get('/Ordonnance/list', [OrdonnanceController::class, 'index'])->name('Ordonnance.index');
Route::get('/Ordonnance/create', [OrdonnanceController::class, 'create'])->name('Ordonnance.create');




//dowlload and preview prescription route 
Route::get('/preview', [previewController::class, 'index']);
Route::get('/bull', [previewController::class, 'index1']);
Route::post('/view', [previewController::class, 'viewPDF'])->name('viewPDF');

Route::post('/download-pdf', [previewController::class, 'downloadPDF'])->name('downloadPDF');




// Vérification de l'email
Route::post('/check-email', [AuthController::class, 'checkEmail']);

// Connexion
Route::get('/login', [AuthController::class, 'log'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
//deconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/profile-Doctor', [ProfileDoctorController::class, 'index'])->name('profile');
Route::post('/doctor/update', [ProfileDoctorController::class, 'update'])->name('doctor.update');






