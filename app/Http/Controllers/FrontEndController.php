<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function index(){
        return view('frontend.index');
    }

    public function searchKlinik() {
        return view('frontend.search_klinik');
    }
}
