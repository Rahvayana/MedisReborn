<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    //
    public function index(){
        $data=DB::select(DB::raw('SELECT 
        id, 
        (
           3959 *
           acos(cos(radians(37)) * 
           cos(radians(latitude)) * 
           cos(radians(longitude) - 
           radians(-122)) + 
           sin(radians(37)) * 
           sin(radians(latitude )))
        ) AS distance 
        FROM clinics 
        HAVING distance > 2 
        ORDER BY distance LIMIT 0, 20;'));
        // dd($data);
        return view('frontend.index');
    }

    public function auth()
    {
        if(Auth::user()->role=='PASIEN'){
            return redirect()->route('landing');
        }else{
            return redirect()->route('klinik');
        }
    }

    public function profile()
    {
        $data['user']=Auth::user();
        $data['orders']=Order::where('user_id',Auth::id())->get();
        // dd($data);
        return view('frontend.user',$data);
    }

    public function detail($id)
    {
        $data['order']=Order::find($id);
        return view('frontend.detail',$data);
    }

    public function searchKlinik() {
        return view('frontend.search_klinik');
    }

    public function searchAkupuntur($slug) {
        $data['kliniks'] = DB::table('users')
            ->select(
                'users.id',
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
                'users.id',
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
                'users.id',
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
