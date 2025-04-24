<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $primaryKey = 'id_user'; // ✅ Ini penting

    public $incrementing = false; // ✅ kalau id_user bukan auto-increment (misalnya NIM)

    protected $keyType = 'string'; // ✅ kalau id_user berupa string/NIM
    protected $fillable = [
        'id_user',
        'email',
        'nama',
        'foto',
        'institute',
        'no_telepon',
        'jenis_anggota',
        'alamat_anggota',
        'catatan',
        'password',
        // 'created_at',
        // 'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function getAuthIdentifierName()
    {
        return 'id_user'; // default-nya 'email'
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getJenisAnggotaLabelAttribute()
{
    return match($this->jenis_anggota) {
        1 => 'Mahasiswa',
        2 => 'Dosen',
        3 => 'Karyawan',
        4 => 'Pustakawan',
        5 => 'Admin',
        default => 'Tidak Diketahui',
    };
}

}
