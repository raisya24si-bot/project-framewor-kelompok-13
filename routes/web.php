<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasUmumController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeminjamanController;


// Public (tidak perlu login)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/ketua', function () {
    return view('ketua');
});

Route::get('/anggota', function () {
    return view('anggota');
});

// Auth
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Private (wajib login)
Route::middleware('auth')->group(function () {

    // Dashboard (admin/user setelah login)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Home (guest) setelah login
    Route::get('/guest', [GuestController::class, 'index'])->name('guest.index');

    // CRUD master fasilitas (admin)
    Route::resource('fasilitasUmum', FasilitasUmumController::class)->names('fasilitasUmum');

  
Route::get('/table', [GuestController::class, 'table'])->name('guest.table');

Route::middleware('auth')->group(function () {
    Route::get('/peminjaman/create/{fasilitas}', [PeminjamanController::class, 'create'])
        ->name('peminjaman.create');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])
        ->name('peminjaman.store');
});
Route::middleware('auth')->group(function () {
    Route::view('/peminjaman', 'peminjaman.index');
});

});
