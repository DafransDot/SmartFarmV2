<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HewanTernakController;
use App\Http\Controllers\KelompokTernakController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group. Make something great!
|
*/

// Autentikasi Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman Dashboard yang memerlukan autentikasi
// Halaman Dashboard yang memerlukan autentikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');



// Rute untuk profil yang memerlukan autentikasi
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::get('/settings', function () {
    return view('settings');
})->middleware('auth')->name('settings');




// Rute untuk Hewan Ternak dan Kelompok Ternak yang hanya dapat diakses oleh pengguna yang sudah login
Route::resource('hewan_ternak', HewanTernakController::class)->middleware('auth');
Route::resource('kelompok-ternak', KelompokTernakController::class)->middleware('auth');
