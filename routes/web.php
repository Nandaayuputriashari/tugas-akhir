<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\PeriodeAkreditasiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PengisiBorangController;
use App\Http\Controllers\PenyelenggaraAkreditasiController;
use App\Http\Controllers\InstrumenAkreditasiController;
use App\Http\Controllers\PenyusunanLEDController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/program-studi', [ProgramStudiController::class, 'index'])->name('program-studi.index');
//     Route::get('/program-studi/create', [ProgramStudiController::class, 'create'])->name('program-studi.create');
//     Route::post('/program-studi', [ProgramStudiController::class, 'store'])->name('program-studi.store');
//     Route::get('/program-studi/{id}/edit', [ProgramStudiController::class, 'edit'])->name('program-studi.edit');
// });

Route::resource('program-studi', ProgramStudiController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('periode-akreditasi', PeriodeAkreditasiController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('karyawan', KaryawanController::class);
});

// Route::resource('kriteria', KriteriaController::class)->middleware('auth');
Route::resource('kriteria', KriteriaController::class)->parameters([
    'kriteria' => 'kriteria' // ganti 'kriterium' menjadi 'kriteria'
]);

Route::resource('pengisi-borang', PengisiBorangController::class)->middleware('auth');

Route::get('/pengisi-borang/export-word/{periode}', [PengisiBorangController::class, 'exportWord'])->name('pengisi-borang.export-word');
Route::resource('penyelenggara-akreditasi', PenyelenggaraAkreditasiController::class)->middleware('auth');
Route::resource('instrumen-akreditasi', InstrumenAkreditasiController::class)->middleware('auth');

Route::resource('penyusunan-led', PenyusunanLEDController::class)->middleware('auth')->parameters([
    'penyusunan-led' => 'penyusunan_led'
]);