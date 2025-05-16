<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; // Nama tabel
    protected $primaryKey = 'id_peminjaman'; // Primary Key
    public $incrementing = true; // Karena ID auto-increment
    protected $keyType = 'string';

    protected $fillable = [
        'id_peminjaman',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'status_peminjaman',
        'kode_eksemplar',
        'id_user',
    ];
    public function user()
{
    return $this->belongsTo(User::class, 'id_user', 'id_user'); // sesuaikan jika primary key berbeda
}

}

