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
            'user_id' => 'required|string|max:255',
        ]);

        $user = \App\Models\User::where('user_id', $request->user_id)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        Kunjungan::create([
            'user_id' => $user->user_id,
        ]);

        return redirect()->back()->with([
            'success' => true,
            'user_id' => $user->user_id,
            'user_name' => $user->nama,
            'user_photo' => $user->foto,
        ]);
    }

}
