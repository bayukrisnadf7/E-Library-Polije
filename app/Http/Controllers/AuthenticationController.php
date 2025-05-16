<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Rules\Password;
use Illuminate\Validation\Rules;
class AuthenticationController extends Controller
{
    public function indexLogin()
    {
        return view('authentication.login.index')->with([
            'title' => 'Login'
        ]);
    }
    public function indexRegister()
    {
        return view('authentication.register.index')->with([
            'title' => 'Register'
        ]);
    }
    public function indexLupaPassword()
    {
        return view('authentication.lupa-password.index')->with([
            'title' => 'Lupa Password'
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string|unique:users,user_id',
            'email' => 'required|email|unique:users,email',
            'nama' => 'required|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'user_id' => $request->user_id,
            'email' => $request->email,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'nim' => null,
            'foto' => null,
            'institute' => null,
            'no_telepon' => null,
            'jenis_anggota' => null,
            'alamat_anggota' => null,
            'catatan' => null,
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat.');
    }



    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'user_id' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if (in_array($user->jenis_anggota, [5, 6])) {
                return redirect()->intended('admin/dashboard');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'user_id' => 'ID atau password salah.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Logout dari sistem autentikasi Laravel
        Session::flush(); // Hapus semua data session

        $request->session()->invalidate(); // Invalidate session sekarang
        $request->session()->regenerateToken(); // Regenerasi CSRF token

        return redirect('/login')->with('successLogout', 'Anda telah logout.');
    }

}
