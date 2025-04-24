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
        'ISBN',
        'judul_buku',
        'pengarang',
        'penerbit',
        'tempat_penerbit',
        'tahun_terbit',
        'edisi',
        'bahasa',
        'subyek',
        'deskripsi_fisik',
        'judul_seri',
        'abstrak',
        'cover',
        'gmd',
        'no_panggil',
        'klasifikasi',
    ];
    public function eksemplar()
{
    return $this->hasMany(Eksemplar::class, 'id_buku', 'id_buku');
}
}

