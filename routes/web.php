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
use App\Http\Controllers\KeanggotaanController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\TataTertibController;
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

// Register Start
Route::get('/register', [AuthenticationController::class, 'indexRegister']);
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
// Register End

// Artikel start
Route::get('/artikel', [ArtikelController::class, 'index']);
// Artikel End

// Berita Start
Route::get('/berita', [BeritaController::class, 'index']);
// Berita End   

// Layanan Start
Route::get('/layanan', [LayananController::class, 'index']);
// Layanan End

// Tata tertib Start
Route::get('/tata-tertib', [TataTertibController::class, 'index']);
// Tata tertib End

// Keanggotaan Start
Route::get('/keanggotaan', [KeanggotaanController::class, 'index']);
// Keanggotaan End

// Lupa Password Start
Route::get('/lupa-password', [LupaPasswordController::class, 'indexLupaPassword'])->name('password.request');
Route::post('/lupa-password', [LupaPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
// Lupa Password End

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
Route::middleware(['web', 'auth', 'adminonly'])
    ->prefix('admin')
    ->group(function () {
        // Dashboard Start
        Route::get('/dashboard', [AdminController::class, 'indexDashboard']);
        // Dashboard End
    
        // Bibliography (Buku) Start
        Route::get('/bibliography', [AdminController::class, 'indexBibliography'])->name('main.index-bibliography');
        Route::get('/tambah-bibliography', [BukuController::class, 'tampilanTambahBibliography']);
        Route::post('/tambah-bibliography', [BukuController::class, 'store'])->name('buku.store');
        Route::put('/edit-bibliography/{id}', [BukuController::class, 'update'])->name('buku.update');
        Route::delete('/bibliography/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
        Route::get('/export-bibliography', [BukuController::class, 'exportBibliography']);
        Route::get('/edit-bibliography/{id}', [BukuController::class, 'showEditBibliography'])->name('bibliography.edit');
        // Bibliography End
    
        // Eksemplar Start
        Route::resource('eksemplar', ExemplarController::class);
        Route::get('/eksemplar/{kode_eksemplar}/print', [ExemplarController::class, 'print'])->name('eksemplar.print');
        // Eksemplar End
    
        // Anggota Start
        Route::get('/anggota', [AdminController::class, 'indexAnggota'])->name('main.index-anggota');
        Route::get('/tambah-anggota', [AnggotaController::class, 'tampilanTambahAnggota']);
        Route::post('/tambah-anggota', [AnggotaController::class, 'store'])->name('anggota.store');
        Route::get('/edit-anggota/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
        Route::put('/edit-anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
        Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.delete');
        Route::get('/export-anggota', [AnggotaController::class, 'exportAnggota']);
        Route::get('/main/hapus-anggota-massal', [AnggotaController::class, 'hapusAnggotaMassal'])->name('anggota.massDelete');
        // Anggota End
    
        // Koleksi Start
        Route::get('/koleksi', [AdminController::class, 'indexKoleksi'])->name('main.index-koleksi');
        // Koleksi End
    
        // Artikel Start
        Route::get('/tambah-artikel', [ArtikelController::class, 'tampilanTambahArtikel']);
        Route::get('/edit-artikel/{id}', [ArtikelController::class, 'tampilanEditArtikel']);
        Route::post('/tambah-artikel', [ArtikelController::class, 'store'])->name('artikel.store');
        Route::put('/edit-artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
        Route::delete('artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
        // Artikel End
    
        // Berita Start
        Route::get('/tambah-berita', [BeritaController::class, 'tampilanTambahBerita']);
        Route::get('/edit-berita/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::put('/edit-berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
        Route::post('tambah-berita', [BeritaController::class, 'store'])->name('berita.store');
        Route::delete('/koleksi/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
        // Berita End
    
        // Kategori Start
        Route::resource('/kategori', KategoriController::class);
        // Kategori ENd
    
        // Peminjaman Start
        Route::get('/peminjaman', [AdminController::class, 'indexPeminjaman'])->name('main.index-peminjaman');
        Route::get('/export-peminjaman', [Peminjaman::class, 'exportPeminjaman']);
        // Peminjaman End
    });











// Wildcard harus paling bawah!
Route::get('/admin/{main}/{view}', [AdminController::class, 'show']);