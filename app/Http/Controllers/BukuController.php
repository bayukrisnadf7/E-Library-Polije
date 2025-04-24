<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function indexBuku()
    {
        ini_set('memory_limit', '-1'); // Tambahkan di sini juga jika perlu
        set_time_limit(0);
        // Ambil semua data buku dari database
        $books = Buku::paginate(8);
        return view('buku.index', compact('books'), ['title' => 'Buku']);
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
