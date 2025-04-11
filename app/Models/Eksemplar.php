<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Eksemplar extends Model
{
    use HasFactory;

    protected $table = 'exemplar';
    protected $primaryKey = 'kode_eksemplar';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_eksemplar',
        'nomor_panggil',
        'tipe_koleksi',
        'tanggal_penerimaan',
        'lokasi',
        'tanggal_pemesanan',
        'status',
        'lokasi_rak',
        'tanggal_faktur',
        'id_buku'
    ];

    // Relasi ke Buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id_buku');
    }
}
