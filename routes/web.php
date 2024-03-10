<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SuperUser;
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
    Route::get('/', [AttendanceController::class, 'index']);
    // Route::get('/kelas/{id}', [AttendanceController::class, 'show']);
    Route::get('/senarai/{id}', [AttendanceController::class, 'senarai']);
    Route::get('/edit/{id}', [AttendanceController::class, 'edit']);
    Route::get('/daftar_guru', [AttendanceController::class, 'daftarGuru']);
    Route::get('/senarai_guru', [AttendanceController::class, 'senaraiGuru']);
    Route::get('/laporan_pelajar', [AttendanceController::class, 'laporanPelajar']);
    Route::post('/edit/{id}', [AttendanceController::class, 'tambahKehadiran']);

    Route::post('/profile/{id}', [AttendanceController::class, 'profile']);
    Route::delete('/delete/{id}', [AttendanceController::class, 'destroy'])->name('edit.destroy');

    Route::get('/senarai_sekolah/{id}', [SuperUser::class, 'showClass']);

    Route::get('/profile/{id}', [AttendanceController::class, 'editProfile']);
    Route::put('/profile/{id}', [AttendanceController::class, 'updateProfile']);

    Route::delete('/deleteGuru/{id}', [AttendanceController::class, 'destroyGuru'])->name('edit.destroyGuru');
});

Route::post('/landingpage', [AttendanceController::class, 'rekodKehadiran']);
Route::get('/landingpage', [AttendanceController::class, 'landingpage']);

require __DIR__.'/auth.php';
