<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eksemplar;

class ExemplarControllerAPI extends Controller
{
    // Get All Exemplar
    public function index()
    {
        $exemplar = Eksemplar::with('buku')->get();
        return response()->json($exemplar);
    }

    // Get Exemplar by ID
    public function show($id)
    {
        $exemplar = Eksemplar::with('buku')->find($id);
        if (!$exemplar) {
            return response()->json(['message' => 'Exemplar tidak ditemukan'], 404);
        }

        return response()->json($exemplar);
    }

    // Create Exemplar
    public function store(Request $request)
    {
        $request->validate([
            'kode_eksemplar' => 'required|unique:exemplar,kode_eksemplar',
            'lokasi' => 'required|string|max:255',
            'lokasi_rak' => 'required|string|max:255',
            'tipe_koleksi' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'id_buku' => 'required|exists:buku,id_buku',
        ]);

        $exemplar = Eksemplar::create($request->all());

        return response()->json(['message' => 'Exemplar berhasil ditambahkan', 'exemplar' => $exemplar], 201);
    }

    // Update Exemplar
    public function update(Request $request, $id)
    {
        $exemplar = Eksemplar::find($id);
        if (!$exemplar) {
            return response()->json(['message' => 'Exemplar tidak ditemukan'], 404);
        }

        $request->validate([
            'lokasi' => 'sometimes|required|string|max:255',
            'lokasi_rak' => 'sometimes|required|string|max:255',
            'tipe_koleksi' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|string|max:255',
            'id_buku' => 'sometimes|required|exists:buku,id_buku',
        ]);

        $exemplar->update($request->all());

        return response()->json(['message' => 'Exemplar berhasil diperbarui', 'exemplar' => $exemplar]);
    }

    // Delete Exemplar
    public function destroy($id)
    {
        $exemplar = Eksemplar::find($id);
        if (!$exemplar) {
            return response()->json(['message' => 'Exemplar tidak ditemukan'], 404);
        }

        $exemplar->delete();

        return response()->json(['message' => 'Exemplar berhasil dihapus']);
    }

    // Ambil buku dari exemplar tertentu
    public function getBukuByExemplar($kode_eksemplar)
    {
        $exemplar = Eksemplar::with('buku')->find($kode_eksemplar);
        if (!$exemplar) {
            return response()->json(['message' => 'Exemplar tidak ditemukan'], 404);
        }

        return response()->json($exemplar->buku);
    }
}
