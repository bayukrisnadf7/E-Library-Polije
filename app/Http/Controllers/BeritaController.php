<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(){
        return view('berita.index')->with([
            'title' => 'Berita'
        ]);
    }
    public function tampilanTambahBerita()
    {
        return view('main.tambah-berita');
    }
    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'penulis' => 'required|string|max:255',
            'tanggal_upload' => 'required|date',
        ]);

        $data = $request->except('thumbnail');

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName(); // biar unik
            $file->move(public_path('thumbnails'), $filename);
            $data['thumbnail'] = $filename; // hanya nama file-nya saja
        }

        Berita::create($data);

        return redirect()->route('main.index-koleksi')->with('success', 'Berita berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('main.edit-berita', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tanggal_upload' => 'required|date',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('thumbnail');

        // Jika ada file thumbnail baru
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama dari folder public/thumbnails
            if ($berita->thumbnail && file_exists(public_path('thumbnails/' . $berita->thumbnail))) {
                unlink(public_path('thumbnails/' . $berita->thumbnail));
            }

            // Upload thumbnail baru
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('thumbnails'), $filename);
            $data['thumbnail'] = $filename;
        }

        $berita->update($data);

        return redirect()->route('main.index-koleksi')->with('success', 'Berita berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('main.index-koleksi')->with('success', 'Berita berhasil dihapus.');
    }
}

