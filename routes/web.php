<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\MakananMinumanController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\RegisterController;


// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login/Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard untuk semua yang login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});

// CRUD khusus admin
Route::middleware(['auth'])->group(function () {
    Route::resource('barang', BarangController::class);
    Route::resource('makanan-minuman', MakananMinumanController::class);
    Route::resource('pelayanan', PelayananController::class);
    Route::resource('ulasan', UlasanController::class);
});