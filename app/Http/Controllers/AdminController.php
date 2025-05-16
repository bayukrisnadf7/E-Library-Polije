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
use Carbon\Carbon;

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
    public function indexDashboard(Request $request)
    {
        $tahun = $request->input('tahun', Carbon::now()->year); // default tahun ini

        $totalBuku = Buku::count();
        $jumlahPeminjaman = Peminjaman::count();
        $jumlahAnggota = User::count();

        $hariIni = Carbon::now()->toDateString();
        $pengembalianHariIni = Peminjaman::whereDate('tgl_pengembalian', $hariIni)->count();
        $peminjamanHariIni = Peminjaman::whereDate('tgl_peminjaman', $hariIni)->count();

        $kategoriPopuler = Buku::select('subyek as kategori')
            ->groupBy('kategori')
            ->selectRaw('subyek as kategori, COUNT(*) as jumlah')
            ->orderByDesc('jumlah')
            ->take(5)
            ->get();

        $peminjamanChartData = Peminjaman::selectRaw('MONTH(tgl_peminjaman) as bulan, COUNT(*) as total')
            ->whereYear('tgl_peminjaman', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        return view('main.index-dashboard', compact(
            'totalBuku',
            'jumlahPeminjaman',
            'jumlahAnggota',
            'pengembalianHariIni',
            'peminjamanHariIni',
            'kategoriPopuler',
            'peminjamanChartData',
            'tahun'
        ));
    }
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
        $search = $request->input('search');

        $query = User::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('user_id', 'like', '%' . $search . '%');
            });
        }

        $anggota = $query->paginate(10);

        return view('main.index-anggota', compact('anggota'));
    }


    public function indexPeminjaman(Request $request)
    {
        $search = $request->input('search');

        $query = Peminjaman::with('user');

        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('user_id', 'like', "%{$search}%");
            });
        }

        $peminjaman = $query->paginate(10);

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
        // Ambil input dari request
        $search = $request->input('search');
        $tahun = $request->input('tahun_terbit');
        $kategori = $request->input('kategori');

        // Mulai query
        $query = Buku::query();

        // 🔍 Pencarian berdasarkan judul atau ISBN
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul_buku', 'like', '%' . $search . '%')
                    ->orWhere('pengarang', 'like', '%' . $search . '%')
                    ->orWhere('tahun_terbit', 'like', '%' . $search . '%')
                    ->orWhere('ISBN', 'like', '%' . $search . '%');
            });
        }

        // 📅 Filter tahun terbit jika diisi dan angka
        if ($tahun && is_numeric($tahun)) {
            $query->where('tahun_terbit', $tahun);
        }

        // 🏷️ Filter kategori jika tidak kosong
        if ($kategori && $kategori !== '') {
            $query->where('kategori', $kategori);
        }

        // 📄 Paginate dan pertahankan query string saat pindah halaman
        $buku = $query->paginate(10)->withQueryString();

        // Kirim data ke view
        return view('main.index-bibliography', [
            'title' => 'Bibliografi Buku',
            'buku' => $buku,
            'search' => $search,
            'tahun_terbit' => $tahun,
            'kategori' => $kategori,
        ]);
    }



}
