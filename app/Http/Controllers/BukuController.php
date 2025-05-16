<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Tambahkan ini di atas jika belum
use Carbon\Carbon; // Untuk tanggal


class BukuController extends Controller
{
    public function rekomendasiBuku(Request $request)
    {
        $search = $request->query('search');
        $books = [];

        if ($search) {
            $books = Buku::where('judul_buku', 'like', "%$search%")
                ->orWhere('pengarang', 'like', "%$search%")
                ->orWhere('tahun_terbit', 'like', "%$search%")
                ->get();
        }

        // Jika tidak sedang mencari, tampilkan rekomendasi, peminjaman terbanyak dan buku terbaru
        $rekomendasi = [];
        $peminjamTerbanyak = [];
        $bukuTerbaru = [];

        if (!$search) {
            $user = Auth::user();
            $jumlah_rekomendasi = 10;

            try {
                // Rekomendasi
                $response = $user
                    ? Http::get("http://localhost:7000/rekomendasi/user/{$user->id_user}", ['jumlah' => $jumlah_rekomendasi])
                    : Http::get("http://localhost:7000/rekomendasi", ['jumlah' => $jumlah_rekomendasi]);

                if ($response->successful()) {
                    $ids = collect($response->json()['buku'] ?? [])->pluck('id_buku');
                    $rekomendasi = Buku::whereIn('id_buku', $ids)->get();
                }

                // Peminjaman Terbanyak
                $peminjamTerbanyak = DB::table('peminjaman')
                    ->join('exemplar as e', 'peminjaman.kode_eksemplar', '=', 'e.kode_eksemplar')
                    ->select('e.id_buku', DB::raw('COUNT(*) as jumlah_peminjaman'))
                    ->whereNotNull('peminjaman.kode_eksemplar')
                    ->groupBy('e.id_buku')
                    ->orderByDesc('jumlah_peminjaman')
                    ->limit(10)
                    ->get();

                // Buku Terbaru
                $bukuTerbaru = Buku::orderByDesc('tahun_terbit')->limit(10)->get();
            } catch (\Exception $e) {
                // Log error jika diperlukan
            }
        }

        return view('buku.index', ['title' => 'Buku'], compact('books', 'search', 'rekomendasi', 'peminjamTerbanyak', 'bukuTerbaru'));
    }

    public function detailBuku($id)
    {
        $buku = Buku::with('eksemplar')->where('id_buku', $id)->first();

        // Filter eksemplar yang tidak berakhiran dengan angka 1
        if ($buku) {
            $buku->eksemplar = $buku->eksemplar->filter(function ($item) {
                return !preg_match('/1$/', $item->kode_eksemplar);
            });
        }

        return view('buku.detail', ['title' => 'Detail Buku'], compact('buku'));
    }
    public function pinjam($id)
    {
        $buku = Buku::with('eksemplar')->findOrFail($id);

        // Ambil semua eksemplar yang tersedia, kecuali urutan pertama
        $eksemplar = $buku->eksemplar->filter(function ($item, $index) {
            return $index > 0 && $item->status === 'Tersedia';
        })->first();

        if (!$eksemplar) {
            return back()->with('error', 'Maaf, tidak ada eksemplar yang tersedia untuk dipinjam.');
        }

        // Tandai sebagai dipinjam
        $eksemplar->status = 'Tidak Tersedia';
        $eksemplar->save();

        // Generate data peminjaman
        $peminjaman = new Peminjaman([ // atau bisa pakai ID khusus lainnya
            'tgl_peminjaman' => Carbon::now(),
            'tgl_pengembalian' => Carbon::now()->addDays(7), // misalnya default 7 hari
            'status_peminjaman' => '3',
            'barcode_peminjaman' => 'PMJ-' . strtoupper(Str::random(6)), // random kode unik
            'kode_eksemplar' => $eksemplar->kode_eksemplar,
            'id_user' => auth()->user()->id_user, // pastikan user sudah login
        ]);

        $peminjaman->save();

        return back()->with('success', 'Buku berhasil dipinjam dengan kode: ' . $eksemplar->kode_eksemplar);
    }




    public function indexBuku(Request $request)
    {
        ini_set('memory_limit', '-1');
        set_time_limit(0);

        $query = Buku::query();

        // Tambahkan pencarian jika ada input
        if ($request->has('search') && $request->search !== null) {
            $search = $request->search;
            $query->where('judul_buku', 'like', "%{$search}%")
                ->orWhere('ISBN', 'like', "%{$search}%");
        }

        $books = $query->paginate(8)->withQueryString(); // agar query string tetap saat pagination

        return view('buku.index', [
            'title' => 'Buku',
            'books' => $books,
            'search' => $request->search,
        ]);
    }


    public function tampilanTambahBibliography()
    {
        return view('main.tambah-bibliography');
    }
    public function showEditBibliography($id)
    {
        $buku = Buku::with('eksemplar')->where('id_buku', $id)->first();

        if (!$buku) {
            abort(404, 'Buku tidak ditemukan');
        }

        return view('main.edit-bibliography', compact('buku'));
    }
    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ISBN' => 'required',
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tempat_penerbit' => 'required',
            'tahun_terbit' => 'required',
            'edisi' => 'required',
            'bahasa' => 'required',
            'subyek' => 'required',
            'deskripsi_fisik' => 'required',
            'judul_seri' => 'NULL',
            'abstrak' => 'required',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png',
            'gmd' => 'required',
            'no_panggil' => 'required',
            'klasifikasi' => 'required'
        ]);

        if ($request->hasFile('cover')) {
            $filename = time() . '_' . $request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('covers'), $filename);
            $data['cover'] = $filename; // hanya nama file, tanpa path
        }

        Buku::create($data);
        return redirect()->route('main.index-bibliography')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::where('id_buku', $id)->firstOrFail();

        $data = $request->validate([
            'ISBN' => 'required',
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tempat_penerbit' => 'required',
            'tahun_terbit' => 'required',
            'edisi' => 'required',
            'bahasa' => 'required',
            'subyek' => 'required',
            'deskripsi_fisik' => 'required',
            'judul_seri' => 'nullable',
            'abstrak' => 'required',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png',
            'gmd' => 'required',
            'no_panggil' => 'required',
            'klasifikasi' => 'required'
        ]);

        if ($request->hasFile('cover')) {
            if ($buku->cover && file_exists(public_path('covers/' . $buku->cover))) {
                unlink(public_path('covers/' . $buku->cover));
            }

            $filename = time() . '_' . $request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('covers'), $filename);
            $data['cover'] = $filename;
        }

        $buku->update($data);
        return redirect()->route('main.index-bibliography')->with('success', 'Buku berhasil diupdate.');
    }


    public function destroy($id)
    {
        $buku = Buku::where('id_buku', $id)->firstOrFail();

        if ($buku->cover && file_exists(public_path('covers/' . $buku->cover))) {
            unlink(public_path('covers/' . $buku->cover));
        }

        $buku->delete();

        return redirect()->route('main.index-bibliography')->with('success', 'Buku berhasil dihapus.');
    }

    public function exportBibliography()
    {
        $books = Buku::all();

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=buku.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $columns = ['id_buku', 'isbn', 'judul_buku', 'pengarang', 'penerbit', 'tempat_penerbit', 'tahun_terbit', 'edisi', 'bahasa', 'subyek', 'deskripsi_fisik', 'judul_seri', 'abstrak', 'cover', 'gmd', 'no_panggil', 'klasifikasi', 'created_at', 'update_at'];

        $callback = function () use ($books, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($books as $book) {
                fputcsv($file, [
                    $book->id_buku,
                    $book->ISBN,
                    $book->judul_buku,
                    $book->pengarang,
                    $book->penerbit,
                    $book->tempat_penerbit,
                    $book->tahun_terbit,
                    $book->edisi,
                    $book->bahasa,
                    $book->subyek,
                    $book->deskripsi_fisik,
                    $book->judul_seri,
                    $book->abstrak,
                    $book->cover,
                    $book->gmd,
                    $book->no_panggil,
                    $book->klasifikasi,
                    $book->created_at,
                    $book->updated_at
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
