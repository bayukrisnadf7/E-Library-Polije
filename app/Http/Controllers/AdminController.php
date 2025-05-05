<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Kategori;
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
    public function indexDashboard()
    {
        return view('main.index-dashboard');
    }
    // Data Buku
    // public function indexBibliography()
    // {
    //     ini_set('memory_limit', '-1'); // Tambahkan di sini juga jika perlu
    //     set_time_limit(0);
    //     // Ambil semua data buku dari database
    //     $books = Buku::all();
    //     return view('main.index-bibliography', compact('books'));
    // }

    // Data Eksemplar
    public function indexEksemplar()
    {
        ini_set('memory_limit', '-1'); // Tambahkan di sini juga jika perlu
        set_time_limit(0);
        $eksemplar = Eksemplar::with('buku')->get();
        return view('main.index-eksemplar', compact('eksemplar'));
    }
    public function indexTambahEksemplar()
    {
        return view('main.tambah-eksemplar');
    }
    public function indexAnggota(Request $request)
    {
        $search = $request->method() === 'POST' ? $request->input('search') : null;

        $query = User::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('id_user', 'like', '%' . $search . '%');
            });
        }

        $anggota = $query->paginate(10);

        return view('main.index-anggota', compact('anggota'));
    }


    public function indexPeminjaman()
    {
        ini_set('memory_limit', '-1');
        set_time_limit(0);
        $peminjaman = Peminjaman::all();
        return view('main.index-peminjaman', compact('peminjaman'));
    }
    public function indexKoleksi()
    {
        ini_set('memory_limit', '-1');
        set_time_limit(0);
        $berita = Berita::all();
        $artikel = Artikel::all();
        $kategori = Kategori::all();
        return view('main.index-koleksi', compact('berita', 'artikel', 'kategori'));
    }
    public function indexBibliography(Request $request)
    {
        $search = $request->method() === 'POST' ? $request->input('search') : null;

        $query = Buku::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('ISBN', 'like', '%' . $search . '%')
                    ->orWhere('judul_buku', 'like', '%' . $search . '%');
            });
        }

        $buku = $query->paginate(10);

        return view('main.index-bibliography', compact('buku'));
    }

}
