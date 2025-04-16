<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Eksemplar;

class AdminController extends Controller
{
    public function show($base, $view)
    {
        // Check if the view exists
        $page = $base . '/' . $view;
        if (view()->exists($page)) {
            // Return the view if it exists
            return view($page);
        } else {
            // Return a 404 response if the view does not exist
            abort(404);
        }

    }
    // Data Buku
    public function indexBuku()
    {
        ini_set('memory_limit', '-1'); // Tambahkan di sini juga jika perlu
        set_time_limit(0);
        // Ambil semua data buku dari database
        $books = Buku::all();
        return view('main.index-buku', compact('books'));
    }
    public function tampilanTambahBuku()
    {
        return view('main.tambah-buku');
    }
    // Data Eksemplar
    public function indexEksemplar()
    {
        ini_set('memory_limit', '-1'); // Tambahkan di sini juga jika perlu
        set_time_limit(0);
        $eksemplar = Eksemplar::with('buku')->get();
        return view('main.index-eksemplar', compact('eksemplar'));
    }
    public function indexTambahEksemplar(){
        return view('main.tambah-eksemplar');
    }
    public function indexAnggota(){
        ini_set('memory_limit', '-1'); // Tambahkan di sini juga jika perlu
        set_time_limit(0);
        $anggota = User::all();
        return view('main.index-anggota', compact('anggota'));
    }
    public function indexPeminjaman(){
        ini_set('memory_limit', '-1');
        set_time_limit(0);
        $peminjaman = Peminjaman::all();
        return view('main.index-peminjaman', compact('peminjaman'));
    }

}
