<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasUmumController;
use App\Http\Controllers\GuestController; 
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ketua', function () {
    return view('ketua');
});

Route::get('/anggota', function () {
    return view('anggota');
});
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');


        Route::resource('guest', GuestController::class);

//Route::get('dashboard', [DashboardController::class, 'index'])-> name('dashboard');

//Route::resource('guest', GuestController::class);

//Route::get('/login', function () {
    //return view('auth.login');   // sesuaikan dengan path login.blade.php Anda
//})->name('login');

//Route::get('/guest', [GuestController::class, 'index'])->name('guest.index');


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

//-------------------------------------------------------------------------------//


// daftar data (sudah ada)
//Route::get('/guest', [GuestController::class, 'index'])->name('guest.index');

// form tambah fasilitas
Route::get('/guest/create', [GuestController::class, 'create'])->name('guest.create');

// simpan data baru
Route::post('/guest', [GuestController::class, 'store'])->name('guest.store');

// form edit fasilitas
Route::get('/guest/{id}/edit', [GuestController::class, 'edit'])->name('guest.edit');

// update data
Route::put('/guest/{id}', [GuestController::class, 'update'])->name('guest.update');

// hapus data
Route::delete('/guest/{id}', [GuestController::class, 'destroy'])->name('guest.destroy');

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/guest', [GuestController::class, 'index'])
    ->name('guest.index')
    ->middleware('checkislogin');
