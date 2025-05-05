<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $berita = Berita::all();
        $artikel = Artikel::all();
        return view('home.index', compact('berita', 'artikel'))->with([
            'title' => 'Home'
        ]);
    }
}
