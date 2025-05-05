<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function index()
    {
        return view('kunjungan.index')->with([
            'title' => 'Kunjungan'
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|string|max:255',
        ]);

        $user = \App\Models\User::where('id_user', $request->id_user)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        Kunjungan::create([
            'id_user' => $user->id_user,
        ]);

        return redirect()->back()->with([
            'success' => true,
            'user_id' => $user->id_user,
            'user_name' => $user->nama,
            'user_photo' => $user->foto,
        ]);
    }

}
