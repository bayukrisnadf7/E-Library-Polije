<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ExemplarControllerAPI;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HubungiKamiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\UserController;
use App\Models\Peminjaman;
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



// Buku
Route::get('/buku', [BukuController::class, 'indexBuku']);

// Kunjungan
Route::get('/kunjungan', [KunjunganController::class, 'index']);
Route::post('/kunjungan', [KunjunganController::class, 'store'])->name('kunjungan.store');

// Profil
Route::get('/profil', [UserController::class, 'edit'])->name('profil.edit');
Route::post('/profil', [UserController::class, 'update'])->name('profil.update');

// Admin

// Dashboard Start

Route::middleware(['web', 'auth', 'adminonly'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'indexDashboard']);
    });
// Dashboard End


// Buku Start
Route::match(['get', 'post'], '/admin/bibliography', [AdminController::class, 'indexAnggota'])->name('bibliography.index');
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
// Route::match(['get', 'post'], '/admin/anggota', [AdminController::class, 'indexAnggota'])->name('anggota.index');
Route::get('/admin/anggota', [AdminController::class, 'indexAnggota'])->name('main.index-anggota');
Route::get('/admin/tambah-anggota', [AnggotaController::class, 'tampilanTambahAnggota']);
Route::post('/admin/tambah-anggota', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/admin/edit-anggota/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/admin/edit-anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/admin/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.delete');
Route::get('/admin/export-anggota', [AnggotaController::class, 'exportAnggota']);
Route::get('/admin/main/hapus-anggota-massal', [AnggotaController::class, 'hapusAnggotaMassal'])->name('anggota.massDelete');
// Anggota End

// Koleksi Start
Route::get('/admin/koleksi', [AdminController::class, 'indexKoleksi'])->name('main.index-koleksi');
// Koleksi End

// Artikel Start
Route::get('/admin/tambah-artikel', [ArtikelController::class, 'tampilanTambahArtikel']);
Route::get('/admin/edit-artikel/{id}', [ArtikelController::class, 'tampilanEditArtikel']);
Route::post('admin/tambah-artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::put('admin/edit-artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('admin/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
// Artikel End

// Berita Start
Route::get('/admin/tambah-berita', [BeritaController::class, 'tampilanTambahBerita']);
Route::get('/admin/edit-berita/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/admin/edit-berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
Route::post('admin/tambah-berita', [BeritaController::class, 'store'])->name('berita.store');
Route::delete('/admin/koleksi/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
// Berita End

// Kategori Start
Route::resource('/admin/kategori', KategoriController::class);
// Kategori ENd

// Peminjaman Start
Route::get('/admin/peminjaman', [AdminController::class, 'indexPeminjaman'])->name('main.index-peminjaman');
Route::get('/admin/export-peminjaman', [Peminjaman::class, 'exportPeminjaman']);
// Peminjaman End
// Wildcard harus paling bawah!
Route::get('/admin/{main}/{view}', [AdminController::class, 'show']);