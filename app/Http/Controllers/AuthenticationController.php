<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function indexLogin(){
        return view('authentication.login.index')->with([
            'title' => 'Login'
        ]);
    }
    public function indexRegister(){
        return view('authentication.register.index')->with([
            'title' => 'Register'
        ]);
    }
    public function indexLupaPassword(){
        return view('authentication.lupa-password.index')->with([
            'title' => 'Lupa Password'
        ]);
    }
}
