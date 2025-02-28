<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'id_user' => 'required',
            'email' => 'required',
            'nama' => 'required',
            'foto' => 'required',
            'institute' => 'required',
            'no_telepon' => 'required',
            'jenis_anggota' => 'required',
            'password' => 'required',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $user = User::create($request->all());
        if($user){
            return response()->json($user, 201);
        } else {
            return response()->json(['message' => 'Registration Failed'], 400);
        }
    }
}
