<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ExemplarControllerAPI;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HubungiKamiController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\TentangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ExemplarController;
use App\Http\Controllers\AuthController;

Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/login', [AuthenticationController::class, 'indexLogin']);
    Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('login');
    // Logout juga sebaiknya ditaruh di sini
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('/register', [AuthenticationController::class, 'indexRegister']);
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::get('/lupa-password', [LupaPasswordController::class, 'indexLupaPassword'])->name('password.request');;
Route::post('/lupa-password', [LupaPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');

//Tentang
Route::get('/tentang', [TentangController::class, 'index']);

// Hubungi Kami
Route::get('/hubungi-kami', [HubungiKamiController::class, 'index']);

Route::get('/kunjungan', [KunjunganController::class, 'index']);

// Buku
Route::get('/buku', [BukuController::class, 'indexBuku']);

// Admin

// Dashboard Start

Route::middleware(['web', 'auth', 'adminonly'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'indexDashboard']);
    });
// Dashboard End


// Buku Start
Route::get('/admin/bibliography', [AdminController::class, 'indexBibliography'])->name('main.index-bibliography');
Route::get('/admin/tambah-bibliography', [BukuController::class, 'tampilanTambahBibliography']);
Route::post('admin/tambah-bibliography', [BukuController::class, 'store'])->name('buku.store');
Route::put('admin/edit-bibliography/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/admin/bibliography/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/admin/export-bibliography', [BukuController::class, 'exportBibliography']);
// Buku End

// Eksemplar Start
Route::resource('eksemplar', ExemplarController::class);
Route::get('/admin/edit-bibliography/{id}', [BukuController::class, 'showEditBibliography'])->name('main.edit-bibliography');
Route::get('/eksemplar/{kode_eksemplar}/print', [ExemplarController::class, 'print'])->name('eksemplar.print');
// Eksemplar End

// Anggota Start
Route::get('/admin/anggota', [AdminController::class, 'indexAnggota']);
// Anggota End

// Koleksi Start
Route::get('/admin/koleksi', [AdminController::class, 'indexKoleksi']);
// Koleksi End
// Peminjaman Start
Route::get('/admin/peminjaman', [AdminController::class, 'indexPeminjaman']);
// Peminjaman End
// Wildcard harus paling bawah!
Route::get('/admin/{main}/{view}', [AdminController::class, 'show']);