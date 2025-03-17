<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function indexBuku(){
        return view('buku.index')->with([
            'title' => 'Buku'
        ]);
    }
    // Get All Buku
    public function index()
    {
        $buku = Buku::all();
        return response()->json($buku);
    }

    // Get Buku by ID
    public function show($id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        return response()->json($buku);
    }

    // Create Buku
    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required|unique:buku,id_buku',
            'judul_buku' => 'required|string|max:255',
            'deskripsi_buku' => 'required|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ISBN' => 'required|string|unique:buku,ISBN',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'kota_terbit' => 'required|string|max:255',
            'kode_barcode' => 'required|string|unique:buku,kode_barcode',
        ]);

        // Simpan cover dalam bentuk BLOB
        $cover = file_get_contents($request->file('cover'));

        $buku = Buku::create([
            'id_buku' => $request->id_buku,
            'judul_buku' => $request->judul_buku,
            'deskripsi_buku' => $request->deskripsi_buku,
            'cover' => $cover, // Simpan BLOB
            'ISBN' => $request->ISBN,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'kota_terbit' => $request->kota_terbit,
            'kode_barcode' => $request->kode_barcode,
        ]);

        return response()->json(['message' => 'Buku berhasil ditambahkan', 'buku' => $buku], 201);
    }

    // Update Buku
    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        $request->validate([
            'judul_buku' => 'sometimes|required|string|max:255',
            'deskripsi_buku' => 'sometimes|required|string',
            'cover' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ISBN' => 'sometimes|required|string|unique:buku,ISBN,' . $id . ',id_buku',
            'pengarang' => 'sometimes|required|string|max:255',
            'penerbit' => 'sometimes|required|string|max:255',
            'tahun_terbit' => 'sometimes|required|integer|min:1900|max:' . date('Y'),
            'kota_terbit' => 'sometimes|required|string|max:255',
            'kode_barcode' => 'sometimes|required|string|unique:buku,kode_barcode,' . $id . ',id_buku',
        ]);

        // Jika ada cover baru, simpan ulang sebagai BLOB
        if ($request->hasFile('cover')) {
            $buku->cover = file_get_contents($request->file('cover'));
        }

        $buku->update($request->except('cover'));

        return response()->json(['message' => 'Buku berhasil diperbarui', 'buku' => $buku]);
    }

    // Delete Buku
    public function destroy($id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        $buku->delete();

        return response()->json(['message' => 'Buku berhasil dihapus']);
    }

    // Ambil semua exemplar dari buku tertentu
    public function getExemplarByBuku($id_buku)
    {
        $buku = Buku::with('exemplars')->find($id_buku);
        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        return response()->json($buku);
    }
}
