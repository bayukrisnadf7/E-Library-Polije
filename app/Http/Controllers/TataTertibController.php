<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TataTertibController extends Controller
{
    public function index(){
        return view('tata-tertib.index')->with([
            'title' => 'Tata Tertib'
        ]);
    }
}
