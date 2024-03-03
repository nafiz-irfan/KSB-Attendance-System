<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [AttendanceController::class, 'index']);
    // Route::get('/kelas/{id}', [AttendanceController::class, 'show']);
    Route::get('/senarai/{id}', [AttendanceController::class, 'senarai']);
    Route::get('/edit/{id}', [AttendanceController::class, 'edit']);
    Route::get('/daftar_guru', [AttendanceController::class, 'daftarGuru']);
    Route::get('/senarai_guru', [AttendanceController::class, 'senaraiGuru']);
    Route::get('/laporan_pelajar', [AttendanceController::class, 'laporanPelajar']);
    Route::post('/edit/{id}', [AttendanceController::class, 'tambahKehadiran']);
    Route::post('/profile/{id}', [AttendanceController::class, 'profile']);
    
});

Route::post('/landingpage', [AttendanceController::class, 'rekodKehadiran']);
Route::get('/landingpage', [AttendanceController::class, 'landingpage']);

require __DIR__.'/auth.php';
