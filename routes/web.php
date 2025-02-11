<?php

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

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::delete('/users/{id}',[UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}',[UserController::class, 'update'])->name('users.update');