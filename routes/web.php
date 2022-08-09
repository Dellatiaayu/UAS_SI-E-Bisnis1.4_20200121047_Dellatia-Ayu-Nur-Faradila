<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\KontrakController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resources([
    'Mahasiswa'=>MahasiswaController::class,
    'Absen'=>AbsenController::class,
    'Jadwal'=>JadwalController::class,
    'Semester'=>SemesterController::class,
    'Matakuliah'=>MatakuliahController::class,
    'Kontrak'=>KontrakController::class,
]);


require __DIR__.'/auth.php';
