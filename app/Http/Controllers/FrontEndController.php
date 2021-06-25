<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    //
    public function index(){
        return view('frontend.index');
    }

    public function searchKlinik() {
        return view('frontend.search_klinik');
    }

    public function searchAkupuntur() {
        $data['kliniks'] = DB::table('users')
            ->select(
                'users.klinik_name',
                'users.klinik_owner',
                'users.klinik_owner_phone',
                'users.klinik_address',
                'users.photo',
                'users.klinik_phone',
                'users.klinik_therapist',
                'users.klinik_open_close',
                'users.klinik_time_per_day',
                't.therapy_name',
                't.price',
            )->join('therapies as t', 't.user_id', '=', 'users.id')
            ->where('t.therapy_name', '=', 'akupuntur')
            ->get();
            // dd($data);
        return view('frontend.search_akupuntur', $data);
    }

    public function searchBekam() {
        $data['kliniks'] = DB::table('users')
            ->select(
                'users.klinik_name',
                'users.klinik_owner',
                'users.klinik_owner_phone',
                'users.klinik_address',
                'users.photo',
                'users.klinik_phone',
                'users.klinik_therapist',
                'users.klinik_open_close',
                'users.klinik_time_per_day',
                't.therapy_name',
                't.price',
            )->join('therapies as t', 't.user_id', '=', 'users.id')
            ->where('t.therapy_name', '=', 'bekam')
            ->get();
            // dd($data);
        return view('frontend.search_bekam', $data);
    }

    public function searchPijat() {
        $data['kliniks'] = DB::table('users')
            ->select(
                'users.klinik_name',
                'users.klinik_owner',
                'users.klinik_owner_phone',
                'users.klinik_address',
                'users.photo',
                'users.klinik_phone',
                'users.klinik_therapist',
                'users.klinik_open_close',
                'users.klinik_time_per_day',
                't.therapy_name',
                't.price',
            )->join('therapies as t', 't.user_id', '=', 'users.id')
            ->where('t.therapy_name', '=', 'pijat')
            ->get();
            // dd($data);
        return view('frontend.search_pijat', $data);
    }
}
