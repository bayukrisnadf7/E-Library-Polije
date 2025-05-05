<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eksemplar;
use Milon\Barcode\Facades\DNS1D;



class ExemplarController extends Controller
{
    public function create()
    {
        return view('eksemplar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_eksemplar' => 'required',
            'nomor_panggil' => 'required',
            'tipe_koleksi' => 'required',
            'tanggal_penerimaan' => 'required|date',
            'lokasi' => 'required',
            'lokasi_rak' => 'required',
            'id_buku' => 'required',
        ]);

        Eksemplar::create([
            'kode_eksemplar' => $request->kode_eksemplar,
            'nomor_panggil' => $request->nomor_panggil,
            'tipe_koleksi' => $request->tipe_koleksi,
            'tanggal_penerimaan' => $request->tanggal_penerimaan,
            'lokasi' => $request->lokasi,
            'lokasi_rak' => $request->lokasi_rak,
            'id_buku' => $request->id_buku,
            'tanggal_faktur' => $request->tanggal_penerimaan,
            'tanggal_pemesanan' => $request->tanggal_penerimaan,
        ]);

        return redirect()->route('main.edit-bibliography', ['id' => $request->id_buku])
            ->with('success', 'Data eksemplar berhasil ditambahkan!');
    }

    public function update(Request $request, $kode_eksemplar)
    {
        $request->validate([
            'kode_eksemplar' => 'required',
            'nomor_panggil' => 'required',
            'tipe_koleksi' => 'required',
            'tanggal_penerimaan' => 'required|date',
            'lokasi' => 'required',
            'lokasi_rak' => 'required',
            'id_buku' => 'required',
        ]);

        $eksemplar = Eksemplar::findOrFail($kode_eksemplar);

        $eksemplar->update([
            'kode_eksemplar' => $request->kode_eksemplar,
            'nomor_panggil' => $request->nomor_panggil,
            'tipe_koleksi' => $request->tipe_koleksi,
            'tanggal_penerimaan' => $request->tanggal_penerimaan,
            'lokasi' => $request->lokasi,
            'lokasi_rak' => $request->lokasi_rak,
            'id_buku' => $request->id_buku,
            'tanggal_faktur' => $request->tanggal_penerimaan,
            'tanggal_pemesanan' => $request->tanggal_penerimaan,
        ]);

        return redirect()->route('main.edit-bibliography', ['id' => $request->id_buku])
            ->with('success', 'Data eksemplar berhasil diperbarui!');
    }


    public function destroy($kode_eksemplar)
    {
        $eksemplar = Eksemplar::findOrFail($kode_eksemplar);
        $idBuku = $eksemplar->id_buku;

        $eksemplar->delete();

        return redirect()->route('main.edit-bibliography', ['id' => $idBuku])
            ->with('success', 'Data eksemplar berhasil dihapus!');
    }

    public function print($kode_eksemplar)
    {
        $eksemplar = Eksemplar::where('kode_eksemplar', $kode_eksemplar)->firstOrFail();
        return view('eksemplar.print', compact('eksemplar'));
    }
    
}
