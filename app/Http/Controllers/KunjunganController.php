<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function index(){
        return view('kunjungan.index')->with([
            'title' => 'Kunjungan'
        ]);
    }
}
