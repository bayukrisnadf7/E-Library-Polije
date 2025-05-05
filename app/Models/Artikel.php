<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel'; // Nama tabel
    protected $primaryKey = 'id_artikel'; // Primary Key
    public $incrementing = false; // Karena ID bukan auto-increment
    protected $keyType = 'string';
    protected $fillable = [
        'judul', 'thumbnail', 'penulis', 'tanggal_upload', 'abstrak', 'kategori'
    ];
}

