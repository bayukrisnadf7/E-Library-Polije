<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita'; // Nama tabel
    protected $primaryKey = 'id_berita'; // Primary Key
    public $incrementing = false; // Karena ID bukan auto-increment
    protected $keyType = 'string';
    protected $fillable = [
        'judul', 'thumbnail', 'penulis', 'tanggal_upload', 'abstrak'
    ];
}

