<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\AbsenController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\SemesterController;
use App\Http\Controllers\Api\MatakuliahController;
use App\Http\Controllers\Api\KontrakController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('', [MahasiswaController::class, 'index']);
//Route::post('', [MahasiswaController::class, 'store']);
//Route::put('', [MahasiswaController::class, 'update']);
//Route::get('', [MahasiswaController::class, 'show']);

Route::resources([
   'Mahasiswa'=>MahasiswaController::class,
   'Absen'=>AbsenController::class,
   'Jadwal'=>JadwalController::class,
   'Semester'=>SemesterController::class,
   'Matakuliah'=>MatakuliahController::class,
   'Kontrak'=>KontrakController::class,
]);