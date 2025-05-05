<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function tampilanEditArtikel($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('main.edit-artikel', compact('artikel'));
    }
    public function tampilanTambahArtikel(){
        $kategori = Kategori::all();
        return view('main.tambah-artikel', compact('kategori'));
    }
    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'penulis' => 'required|string|max:255',
            'tanggal_upload' => 'required|date',
            'abstrak' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
        ]);

        $data = $request->except('thumbnail');

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName(); // biar unik
            $file->move(public_path('thumbnails'), $filename);
            $data['thumbnail'] = $filename; // hanya nama file-nya saja
        }

        Artikel::create($data);

        return redirect()->route('main.index-koleksi')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tanggal_upload' => 'required|date',
            'kategori' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('thumbnail');

        // Jika ada file thumbnail baru
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama dari folder public/thumbnails
            if ($artikel->thumbnail && file_exists(public_path('thumbnails/' . $artikel->thumbnail))) {
                unlink(public_path('thumbnails/' . $artikel->thumbnail));
            }

            // Upload thumbnail baru
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('thumbnails'), $filename);
            $data['thumbnail'] = $filename;
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('main.index-koleksi')->with('success', 'Artikel berhasil dihapus.');
    }
}

