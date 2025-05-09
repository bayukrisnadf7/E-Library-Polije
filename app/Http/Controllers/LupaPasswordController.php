<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class LupaPasswordController extends Controller
{
    public function indexLupaPassword()
    {
        return view('authentication.lupa-password.index')->with([
            'title' => 'Lupa Password'
        ]);
    }
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // ❗ Cek apakah email ada di database
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('resetError', 'Email tidak terdaftar.');
        }

        // Kirim link reset password
        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('resetSuccess', 'Link reset password telah dikirim ke email Anda.')
            : back()->with('resetError', 'Gagal mengirim link reset. Silakan coba lagi.');
    }
}
