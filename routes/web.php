<?php

use App\Http\Controllers\CatatanKeuanganController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\DataAnakController;
use App\Http\Controllers\DataOrangTuaController;
use App\Http\Controllers\DataSekolahController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WelcomeController;
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

Route::resource('/', WelcomeController::class);
Route::resource('hubungi_kami', WelcomeController::class);
Route::get('/Donasi_Sekarang', [WelcomeController::class, 'cara_donasi']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/export/{id}', [DataAnakController::class, 'export']);
    Route::get('/exportAll', [DataAnakController::class, 'exportAll']);
    Route::get('/exportDonasi/{id}', [DonasiController::class, 'export']);
    Route::get('/exportAllDonasi', [DonasiController::class, 'exportAll']);
    // Route::get('/exportPengeluaran/{id}', [PengeluaranController::class, 'export']);
    Route::get('/rekap_pengeluaran', [PengeluaranController::class, 'rekap']);
    Route::get('/rekap_donasi', [DonasiController::class, 'rekap']);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('data_admin', DataAdminController::class);
    Route::resource('Data_Anak', DataAnakController::class);
    Route::resource('kontak', ContactController::class);
    // Route::resource('Data_Orang_Tua', DataOrangTuaController::class);
    Route::resource('Data_Sekolah', DataSekolahController::class);
    
    Route::resource('Data_Kegiatan', KegiatanController::class);
    
    Route::resource('Data_Donasi', DonasiController::class);
    
    Route::resource('pengeluaran', PengeluaranController::class);

    Route::resource('catatan_keuangan', CatatanKeuanganController::class);
    Route::get('/rekap_keuangan', [CatatanKeuanganController::class, 'rekap']);

    Route::resource('setting', SettingController::class);
});
