<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function indexBuku()
    {
        // Ambil data buku dengan paginasi (misalnya, 8 per halaman)
        $books = Buku::paginate(8);

        return view('buku.index', ['title' => 'Buku'], compact('books'));
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
        $validator = Validator::make($request->all(), [
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
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Cek kembali semua variabel',
                'errors' => $validator->errors()
            ], 422);
        }

        // Ambil waktu sekarang
        date_default_timezone_set('Asia/Jakarta');
        $timestamp = now()->format('Y-m-d_H-i-s');
        // Ambil extension file asli
        $extension = $request->file('cover')->getClientOriginalExtension();
        // Buat nama file baru berdasarkan datetime dan ISBN
        $filename = "{$timestamp}_{$request->ISBN}.{$extension}";
        // Simpan file dengan nama baru
        $coverPath = $request->file('cover')->storeAs('public/covers', $filename);

        $buku = Buku::create([
            'id_buku' => $request->id_buku,
            'judul_buku' => $request->judul_buku,
            'deskripsi_buku' => $request->deskripsi_buku,
            'cover' => str_replace('public/', 'storage/', $coverPath),
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

        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Cek kembali semua variabel',
                'errors' => $validator->errors()
            ], 422);
        }
        // Jika ada cover baru, simpan ulang sebagai BLOB
        if ($request->hasFile('cover')) {

            if ($buku->cover) {
                $oldCoverPath = str_replace('storage/', 'public/', $buku->cover);
                if (Storage::exists($oldCoverPath)) {
                    Storage::delete($oldCoverPath);
                }
            }

            // Ambil waktu sekarang dalam format YYYYMMDD_HHmmss
            $timestamp = now()->format('Ymd_His');
            // Ambil extension file asli
            $extension = $request->file('cover')->getClientOriginalExtension();
            // Buat nama file baru berdasarkan datetime dan ISBN
            $filename = "{$timestamp}_{$request->ISBN}.{$extension}";
            // Simpan file dengan nama baru
            $coverPath = $request->file('cover')->storeAs('public/covers', $filename);

            // Update cover baru di database
            $buku->cover = str_replace('public/', 'storage/', $coverPath);
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

        if ($buku->cover) {
            $oldCoverPath = str_replace('storage/', 'public/', $buku->cover);
            if (Storage::exists($oldCoverPath)) {
                Storage::delete($oldCoverPath);
            }
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
