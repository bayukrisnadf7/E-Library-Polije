<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function exportPeminjaman()
    {
        $peminjaman = Peminjaman::all();

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=peminjaman.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $columns = ['id_peminjaman', 'tgl_peminjaman', 'tgl_pengembalian', 'status_peminjaman', 'barcode_peminjaman', 'kode_eksemplar', 'id_user','created_at', 'updated_at'];

        $callback = function () use ($peminjaman, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($peminjaman as $pmjm) {
                fputcsv($file, [
                    $pmjm->id_peminjaman,
                    $pmjm->tgl_peminjaman,
                    $pmjm->tgl_pengembalian,
                    $pmjm->status_peminjaman,
                    $pmjm->barcode_peminjaman,
                    $pmjm->kode_eksemplar,
                    $pmjm->id_user,
                    $pmjm->created_at,
                    $pmjm->updated_at
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
