<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $table = 'kunjungan';
    protected $primaryKey = 'id_kunjungan';
    
    protected $fillable = [
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
