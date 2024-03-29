<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

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

Route::get('/', [AttendanceController::class, 'index']);
Route::get('/kelas/{id}', [AttendanceController::class, 'show']);
Route::get('/senarai', [AttendanceController::class, 'senarai']);
Route::get('/edit/{id}', [AttendanceController::class, 'edit']);
Route::get('/daftar_guru', [AttendanceController::class, 'daftarGuru']);
Route::get('/senarai_guru', [AttendanceController::class, 'senaraiGuru']);
Route::get('/laporan_pelajar', [AttendanceController::class, 'laporanPelajar']);
