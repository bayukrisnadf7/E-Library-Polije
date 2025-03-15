<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    // Proses registrasi
    public function register(Request $request)
    {
        // Check if the username already exists
        $id_userExists = User::where('id_user', $request->id_user)->exists();
        if ($id_userExists) {
            return response()->json(['message' => 'id_user already exists'], 403);
        }

        // Check if the email is valid and not already used
        if (!str_contains($request->email, '@')) {
            return response()->json(['message' => 'Email not valid'], 403);
        }
        $emailExists = User::where('email', $request->email)->exists();
        if ($emailExists) {
            return response()->json(['message' => 'Email already used'], 403);
        }

        if (strlen($request->password) <= 6) {
            return response()->json(['message' => 'password to short'], 403);
        }

        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Baca file gambar dan ubah jadi BLOB
        $foto = file_get_contents($request->file('foto'));
        $user = User::create([
            'id_user' => $request->id_user,
            'email' => $request->email,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'foto' => $foto,
            'institute' => $request->institute,
            'no_telepon' => $request->no_telepon ?? '',
            'jenis_anggota' => $request->jenis_anggota ?? 'mahasiswa',
        ]);

        if ($user) {
            return response()->json(['message' => 'ok'], 200);
        } else {
            return response()->json(['message' => 'unknown eror while creating user'], 406);
        }
    }

    // Proses login
    public function login(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();
        if (!$emailExists) {
            return response()->json(['message' => 'User Not Found'], 403);
        }

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Konversi foto BLOB ke Base64
            $fotoBase64 = $user->foto ? base64_encode($user->foto) : null;

            Session::put('user', [
                'id_user' => $user->id_user,
                'email' => $user->email,
                'nama' => $user->nama,
                'institute' => $user->institute,
                'no_telepon' => $user->no_telepon,
                'jenis_anggota' => $user->jenis_anggota,
            ]);

            return response()->json([
                'message' => 'Login berhasil!',
                'user' => [
                    'id_user' => $user->id_user,
                    'email' => $user->email,
                    'nama' => $user->nama,
                    'foto' => $fotoBase64, // Kirim foto dalam bentuk base64
                    'institute' => $user->institute,
                    'no_telepon' => $user->no_telepon,
                    'jenis_anggota' => $user->jenis_anggota,
                ]
            ]);
        }

        return response()->json([
            'message' => 'Email atau password salah!',
        ], 401);
    }


    // Logout
    public function logout()
    {
        Session::forget('user');
        return response()->json([
            'message' => 'Logout berhasil!'
        ]);
    }

    public function checkSession(Request $request)
    {
        if ($request->session()->has('id_user')) {
            return response()->json([
                'message' => 'Session exists',
                'id_user' => $request->session()->get('id_user'),
            ]);
        } else {
            return response()->json([
                'message' => 'No session found',
            ], 404);
        }
    }

    public function getAllSession(Request $request)
    {
        return response()->json(
            $request->session()->all()
        );
    }

    //buat controllernya dulu buat kirim email
    // public function sendCode(Request $requests)
    // {
    //     $verificationCode = rand(100000, 999999);
    //     $address = $requests->email;

    //     // Create a new instance of VerificationEmail and pass the verification code to it
    //     $email = new VerificationEmail($verificationCode);

    //     // Send the email using Laravel's Mail facade
    //     Mail::to($address)->send($email);
    //     return response()->json(['message' => 'ok'], 200);
    // }
}
