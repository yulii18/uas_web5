<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;

// ── Redirect root ke login ─────────────────────────────────
Route::get('/', function () {
    return redirect()->route('auth.login');
});

// ── Guest routes (belum login) ─────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])
         ->name('auth.register');
    Route::post('/register', [AuthController::class, 'store'])
         ->name('auth.store');
    Route::get('/login', [AuthController::class, 'login'])
         ->name('auth.login');
    Route::post('/login', [AuthController::class, 'authenticate'])
         ->name('auth.authenticate');
});

// ── Auth routes (sudah login) ──────────────────────────────
Route::middleware('auth')->group(function () {

    Route::delete('/logout', [AuthController::class, 'logout'])
         ->name('auth.logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])
         ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])
         ->name('profile.index');

    Route::resource('buku',       BukuController::class);
    Route::resource('anggota',    AnggotaController::class);
    Route::resource('peminjaman', PeminjamanController::class);

    Route::post('/peminjaman/{peminjaman}/kembalikan',
        [PeminjamanController::class, 'kembalikan'])
        ->name('peminjaman.kembalikan')
        ->middleware('role:admin');
});