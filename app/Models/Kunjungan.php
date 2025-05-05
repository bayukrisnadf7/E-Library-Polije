<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $table = 'kunjungan';
    protected $primaryKey = 'id_kunjungan';
    
    protected $fillable = [
        'id_user'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
