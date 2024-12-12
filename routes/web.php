<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HewanTernakController;
use App\Http\Controllers\KelompokTernakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;

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

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

// Autentikasi Routes
Route::get('/login', [AuthController::class, 'tampilHalamanLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'tampilHalamanRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Halaman Dashboard yang memerlukan autentikasi
Route::get('/dashboard',[DashboardController::class, 'tampilDasboard'])->name('dashboard')->middleware('auth');

// Rute untuk Kelompok Ternak yang hanya dapat diakses oleh pengguna yang sudah login
Route::middleware('auth')->group(function () {

    // menampilkan kelompok
    Route::get('/kelompok_ternak', [KelompokTernakController::class, 'index'])->name('kelompok_ternak.index');
    
    // menampilkan list kelompok
    Route::get('/kelompok_ternak/halamanDaftarKelompok', [KelompokTernakController::class, 'halamanDaftarKelompok'])->name('kelompok_ternak.halamanDaftarKelompok');
    
    
    //fitur menambah kelompok
    Route::get('/kelompok_ternak/halamanTambahKelompok', [KelompokTernakController::class, 'halamanTambahKelompok'])->name('kelompok_ternak.halamanTambahKelompok');
    Route::post('/kelompok_ternak', [KelompokTernakController::class, 'tambahkelompokTernak'])->name('kelompok_ternak.tambahkelompokTernak');
    
    
    //fitur edit kelompok
    Route::get('/kelompok_ternak/{kelompokTernak}/halamanEditKelompok', [KelompokTernakController::class, 'halamanEditKelompok'])->name('kelompok_ternak.halamanEditKelompok');
    Route::put('/kelompok_ternak/{kelompokTernak}', [KelompokTernakController::class, 'editKelompok'])->name('kelompok_ternak.editKelompok');
    
    //fitur delete kelompok
    Route::delete('/kelompok_ternak/{kelompokTernak}', [KelompokTernakController::class, 'hapusKelompok'])->name('kelompok_ternak.hapusKelompok');
   
});

// Rute untuk Hewan Ternak yang hanya dapat diakses oleh pengguna yang sudah login
Route::middleware(['auth'])->group(function () {

    //fitur tampil hewan ternak
    Route::get('/hewan_ternak', [HewanTernakController::class, 'index'])->name('hewan_ternak.index');

    //fitur penandaan hewan ternak
    Route::get('/hewan_ternak/halamanPenandaanHewanTernak', [HewanTernakController::class, 'halamanPenandaanHewanTernak'])->name('hewan_ternak.halamanPenandaanHewanTernak');
    Route::post('/hewan_ternak/tambahHewanTernak', [HewanTernakController::class, 'tambahHewanTernak'])->name('hewan_ternak.tambahHewanTernak');

    //fitur detail Hewan ternak
    Route::get('/hewan_ternak/{hewanTernak}', [HewanTernakController::class, 'halamanDetailHewanTernak'])->name('hewan_ternak.halamanDetailHewanTernak');

    //fitur Edit hewan Ternak
    Route::get('/hewan_ternak/{hewanTernak}/halamanEditHewanTernak', [HewanTernakController::class, 'halamanEditHewanTernak'])->name('hewan_ternak.halamanEditHewanTernak');
    Route::put('/hewan_ternak/{hewanTernak}', [HewanTernakController::class, 'editHewanTernak'])->name('hewan_ternak.editHewanTernak');

    //fitur Hapus Hewan Ternak
    Route::post('/hewan_ternak/{hewanTernak}', [HewanTernakController::class, 'hapusHewanTernak'])->name('hewan_ternak.hapusHewanTernak');
});

// Rute untuk kesehatan Controler yang hanya dapat diakses oleh pengguna yang sudah login
    Route::middleware(['auth'])->group(function () {
    // fitur cari Hewan ternak
    Route::get('/kesehatan_hewan', [KesehatanController::class, 'index'])->name('kesehatan_hewan.index');

    // Pencarian hewan ternak
    Route::post('/kesehatan_hewan/halamanDetailKesehatanHewan', [KesehatanController::class, 'cariHewan'])->name('kesehatan_hewan.halamanDetailKesehatanHewan');

    // Penyimpanan data kesehatan hewan ternak
    Route::put('/kesehatan_hewan/{hewanTernak}', [KesehatanController::class, 'simpanKesehatan'])->name('kesehatan_hewan.simpanKesehatan');
});

Route::get('/laporan', [LaporanController::class, 'halamanLaporan'])->name('laporan.index');
Route::post('/laporan/laporan-kelompok-ternak', [LaporanController::class, 'buatLaporan'])->name('laporan.buatLaporan');