<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KunjunganController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ExemplarController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [AuthenticationController::class, 'indexLogin']);
Route::get('/register', [AuthenticationController::class, 'indexRegister']);
Route::get('/lupa-password', [AuthenticationController::class, 'indexLupaPassword']);

//

Route::get('/kunjungan', [KunjunganController::class, 'index']);
Route::middleware('api')->group(function () {
    Route::post('/register', [AuthenticationController::class, 'register']);
});

// Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('api/login', 'login');
    Route::post('api/register', 'register');
    Route::post('api/logout', 'logout');
    Route::get('api/session', 'checkSession');
    Route::get('api/allsession', 'getAllSession');
});


// buku
Route::get('/buku', [BukuController::class, 'indexBuku']);
Route::controller(BukuController::class)->group(function () {
    Route::get('api/buku', 'index');
    Route::get('api/buku/{id}', 'show');
    Route::post('api/buku', 'store');
    Route::put('api/buku/{id}', 'update');
    Route::delete('/api/buku/{id}', 'destroy');
});

// CRUD Buku
// Route::get('api/buku', [BukuController::class, 'index']);
// Route::get('api/buku/{id}', [BukuController::class, 'show']);
// Route::post('/api/buku', [BukuController::class, 'store']);
// Route::put('/api/buku/{id}', [BukuController::class, 'update']);
// Route::delete('/api/buku/{id}', [BukuController::class, 'destroy']);

// CRUD Exemplar
Route::get('/api/exemplar', [ExemplarController::class, 'index']);
Route::get('/api/exemplar/{id}', [ExemplarController::class, 'show']);
Route::post('/api/exemplar', [ExemplarController::class, 'store']);
Route::put('/api/exemplar/{id}', [ExemplarController::class, 'update']);
Route::delete('/api/exemplar/{id}', [ExemplarController::class, 'destroy']);

// Relasi Buku & Exemplar
Route::get('/api/buku/{id}/exemplar', [BukuController::class, 'getExemplarByBuku']);
Route::get('/api/exemplar/{kode_eksemplar}/buku', [ExemplarController::class, 'getBukuByExemplar']);


// Admin
// Buku Start
Route::get('/admin/main/index-buku', [AdminController::class, 'indexBuku']);
Route::get('/admin/main/tambah-buku', [AdminController::class, 'tampilanTambahBuku']);
Route::get('/admin/main/edit-buku/{id}', [BukuController::class, 'showEditBuku']);
Route::get('/admin/main/hapus_buku/{id}', [BukuController::class, 'deleteBuku']);
Route::get('/admin/main/export-buku', [BukuController::class, 'exportCsv']);
// Buku End

// Eksemplar Start
Route::get('/admin/main/index-eksemplar', [AdminController::class, 'indexEksemplar']);

// Eksemplar End

// Anggota Start
Route::get('/admin/main/index-anggota', [AdminController::class, 'indexAnggota']);
// Anggota End

// Peminjaman Start
Route::get('/admin/main/index-peminjaman', [AdminController::class, 'indexPeminjaman']);
// Peminjaman End
// Wildcard harus paling bawah!
Route::get('/admin/{main}/{view}', [AdminController::class, 'show']);