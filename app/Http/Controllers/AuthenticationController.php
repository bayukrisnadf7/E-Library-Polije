<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_user' => 'required',
                'email' => 'required',
                'nama' => 'required',
                'foto' => 'required',
                'institute' => 'required',
                'no_telepon' => 'required',
                'jenis_anggota' => 'required',
                'password' => 'required',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user.required' => 'ID User wajib diisi',
                'email.required' => 'Email wajib diisi',
                'nama.required' => 'Nama wajib diisi',
                'foto.required' => 'Foto wajib diisi',
                'institute.required' => 'Institute wajib diisi',
                'no_telepon.required' => 'No Telepon wajib diisi',
                'jenis_anggota.required' => 'Jenis Anggota wajib diisi',
                'password.required' => 'Password wajib diisi',
            ],
        );
        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors(),
                ],
                400,
            );
        } else {
            $user = User::create([
                'id_user' => $request->id_user,
                'email' => $request->email,
                'nama' => $request->nama,
                'foto' => $request->foto,
                'institute' => $request->institute,
                'no_telepon' => $request->no_telepon,
                'jenis_anggota' => $request->jenis_anggota,
                'password' => bcrypt($request->password),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            if($user){
                return response()->json([
                    'success' => true,
                    'message' => 'Register Berhasil',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Register Gagal',
                ], 400);
            }
        }
    }
}
