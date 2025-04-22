<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        // Periksa apakah pengguna terautentikasi dan memiliki peran admin
        if (Auth::check() && Auth::user()->jenis_anggota == 5) {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman lain atau tampilkan pesan kesalahan
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
