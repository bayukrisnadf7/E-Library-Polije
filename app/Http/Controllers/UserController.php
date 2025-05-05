<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        $riwayat = Peminjaman::where('id_user', Auth::id())->latest()->get();
        return view('profil.index',['title' => 'Profil'], compact('user', 'riwayat'));
    }

    public function update(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'nama' => 'required|string|max:255',
        'nim' => 'nullable|string|max:50',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'no_telepon' => 'nullable|string|max:20',
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    $user = Auth::user();

    $user->email = $request->email;
    $user->nama = $request->nama;
    $user->nim = $request->nim;
    $user->no_telepon = $request->no_telepon;

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $namaFile = time() . '_' . $foto->getClientOriginalName();
        $foto->move(public_path('user'), $namaFile); // simpan di public/user
        $user->foto = $namaFile;
    }

    if ($request->password) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect('/')->with('success', 'Profil berhasil diperbarui!');
}

}
