<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku'; // Nama tabel
    protected $primaryKey = 'id_buku'; // Primary Key
    public $incrementing = false; // Karena ID bukan auto-increment
    protected $keyType = 'string';

    protected $fillable = [
        'id_buku',
        'judul_buku',
        'deskripsi_buku',
        'cover',
        'ISBN',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'kota_terbit',
        'kode_barcode'
    ];
    public function eksemplar()
{
    return $this->hasMany(Eksemplar::class, 'id_buku', 'id_buku');
}
}

