<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\RisalahController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsensiController;

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

Route::redirect('/', '/auth');

// WITHOUT LOGIN
Route::resource('/auth', AutentikasiController::class);
Route::get('/logout-page', [AutentikasiController::class, 'logoutPage'])->name('logout-page');
Route::resource('/absensi', AbsensiController::class);
Route::post('/absensi/masuk', [AbsensiController::class, 'masuk'])->name('masuk');
Route::get('/scan', [AbsensiController::class, 'scan'])->name('scan');
Route::get('/showAbsensi/{id}', [AbsensiController::class, 'showAbsensi'])->name('showAbsensi');

// LOGIN - MATERI
Route::group(['middleware' => 'loginMateri'], function () {
    Route::get('/absensi/{id}/materi', [AbsensiController::class, 'materi'])->name('materi');
});

// LOGIN - DASHBOARD
Route::group(['middleware' => 'login'], function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/risalah', RisalahController::class);
    // Route::resource('/akun', AkunController::class);
    Route::resource('/rapat', RapatController::class);
    // Route::resource('/undangan', UndanganController::class);
    // Route::resource('/absensi', AbsenController::class);
    Route::resource('/karyawan', KaryawanController::class);
    // Route::resource('/materi', MateriController::class);
    // Route::resource('/notulensi', NotulensiController::class);
    Route::get('/logout', [AutentikasiController::class, 'logout'])->name('logout');
    // Route::get('/get_karyawan', [KaryawanController::class, 'getKaryawan'])->name('get_karyawan');
    // Route::get('/profile', [AutentikasiController::class, 'uindex']);
    Route::get('/send_mail', [RapatController::class, 'sendEmail'])->name('send_mail');
    Route::get('/qrcode', [QrCodeController::class, 'index']);
});

