<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Therapy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KlinikController extends Controller
{
    //
    public function index(){
        $data['kliniks'] = DB::table('users')
            ->select('users.id',
            'users.klinik_name',
            'users.email', 'users.klinik_owner', 'users.klinik_owner_phone', 'users.klinik_permission',
            'users.klinik_address',
            'users.photo',
            'users.klinik_phone',
            'users.klinik_therapist',
            'users.klinik_open_close',
            'users.klinik_time_per_day',
            )
            ->get();
        return view('backend.klinik.index', $data);
    }

    public function add(){
        return view('backend.klinik.add');
    }

    public function save(Request $request){
        $file = $request->file('foto_klinik');
        $tujuan_upload = 'uploads/klinik';
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama_file);
        $klinik = new User();
        $klinik->name = $request->klinik_name;
        $klinik->photo = $nama_file;
        $klinik->klinik_name = $request->klinik_name;
        $klinik->klinik_owner = $request->owner_name;
        $klinik->klinik_owner_phone = $request->owner_phone;
        $klinik->klinik_permission = $request->permission;
        $klinik->klinik_address = $request->address;
        $klinik->klinik_phone = $request->klinik_phone;
        $klinik->klinik_therapist = $request->therapiest;
        $klinik->klinik_open_close = $request->open_close;
        $klinik->klinik_time_per_day = $request->time_per_day;

        // for login data
        $klinik->password = Hash::make($request->password);;
        $klinik->email = $request->email;

        $klinik->save();
        $lengTp = count($request->therapy);
        for ($i=0; $i < $lengTp ; $i++) {
            // dd($therapy[$i], $price[$i], $lengTp );
            if($request->price[$i] != null && $request->therapy[$i] != null){
                $therapy = new Therapy();
                $therapy->price = $request->price[$i];
                $therapy->therapy_name = $request->therapy[$i];
                $therapy->user_id = $klinik->id;
                $therapy->save();
            }
        }
        return redirect()->route('klinik');
    }
}
