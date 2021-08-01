<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Models\User;
use App\Models\Therapy;
use App\Terapi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KlinikController extends Controller
{
    //
    public function index(){
        $data['kliniks'] = DB::table('users')
            ->select('users.id',
            'clinics.klinik_name',
            'users.email', 'clinics.klinik_owner', 'clinics.klinik_owner_phone', 'clinics.klinik_permission',
            'clinics.klinik_address',
            'clinics.photo',
            'clinics.klinik_phone',
            'clinics.klinik_therapist',
            'clinics.klinik_open_close',
            'clinics.klinik_time_per_day',
            )
            ->leftJoin('clinics','users.id','clinics.user_id')
            ->where('users.role', '=','KLINIK' )
            ->get();
        return view('backend.klinik.index', $data);
    }

    public function detail($id)
    {
        $data['klinik']=DB::table('users')
        ->select('users.id','users.name',
        'clinics.klinik_name',
        'users.email', 'clinics.klinik_owner', 'clinics.klinik_owner_phone', 'clinics.klinik_permission',
        'clinics.klinik_address',
        'clinics.photo',
        'clinics.klinik_phone',
        'clinics.klinik_therapist',
        'clinics.klinik_open_close',
        'clinics.klinik_time_per_day',
        )
        ->leftJoin('clinics','users.id','clinics.user_id')
        ->where('users.id',$id)->first();
        return view('backend.klinik.detail',$data);
    }

    public function add(){
        $data['terapis']=Terapi::all();
        // dd($data);
        return view('backend.klinik.create',$data);
    }

    public function save(Request $request){
        // dd($request);
        $folderPath = public_path('uploads/klinik/');

        $file = $request->file('foto_klinik');
        $fileName=time().'.'.$file->getClientOriginalExtension();
        if ($request->hasFile('foto_klinik')) {
            $path = public_path().'/uploads/klinik/';
            // dd($path);
            $file->move($path,$fileName);
        }
            $klinik = new User();
            $klinik->name = $request->klinik_name;
            // for login data
            $klinik->role = "KLINIK";
            $klinik->password = Hash::make($request->password);;
            $klinik->email = $request->email;
            $klinik->save();

            $clinic=new Clinic();
            $clinic->user_id = $klinik->id;
            $clinic->photo = 'klinik/' . $fileName;
            $clinic->klinik_name = $request->klinik_name;
            $clinic->klinik_owner = $request->owner_name;
            $clinic->klinik_owner_phone = $request->owner_phone;
            $clinic->klinik_permission = $request->permission;
            $clinic->klinik_address = $request->address;
            $clinic->klinik_phone = $request->klinik_phone;
            $clinic->klinik_therapist = $request->therapiest;
            $clinic->klinik_open_close = $request->open_close;
            $clinic->klinik_time_per_day = $request->time_per_day;
            $clinic->latitude = $request->latitude;
            $clinic->longitude = $request->longitude;
            $clinic->save();

            $lengTp = count($request->therapy);
            for ($i=0; $i < $lengTp ; $i++) {
                // dd($request->therapy[$i] );
                if($request->price[$i] != null && $request->therapy[$i] != null){
                    $therapy = new Therapy();
                    $therapy->price = $request->price[$i];
                    $therapy->therapy_name = strtolower($request->therapy[$i]);
                    $therapy->user_id = $klinik->id;
                    $therapy->save();
                }
            }
            return redirect()->route('klinik');
    }

    public function edit($id)
    {
        $data['klinik']=DB::table('users')
        ->select('users.*',
        'clinics.klinik_name',
        'users.email', 'clinics.klinik_owner', 'clinics.klinik_owner_phone', 'clinics.klinik_permission',
        'clinics.klinik_address',
        'clinics.photo',
        'clinics.user_id',
        'clinics.klinik_phone',
        'clinics.klinik_therapist',
        'clinics.klinik_open_close',
        'clinics.klinik_time_per_day',
        'clinics.latitude',
        'clinics.longitude',
        )
        ->leftJoin('clinics','users.id','clinics.user_id')
        ->where('users.id',$id)->first();
        $data['terapis']=Therapy::where('user_id',$data['klinik']->user_id)->get();
        $data['terapis']=Terapi::all();
        // dd($data);
        return view('backend.klinik.edit',$data);
    }

    public function update(Request $request,$id)
    {
        // dd($request);
        $folderPath = public_path('uploads/klinik/');

        if ($request->hasFile('foto_klinik')) {
            $file = $request->file('foto_klinik');
            $fileName=time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/uploads/klinik/';
            // dd($path);
            $file->move($path,$fileName);
        }
            $clinic=new Clinic();
            $clinic=Clinic::where('user_id',$request->user_id)->first();
            
        if ($request->hasFile('foto_klinik')) {
            $clinic->photo = 'klinik/' . $fileName;
        }
            $clinic->klinik_name = $request->klinik_name;
            $clinic->klinik_owner = $request->owner_name;
            $clinic->klinik_owner_phone = $request->owner_phone;
            $clinic->klinik_permission = $request->permission;
            $clinic->klinik_address = $request->address;
            $clinic->klinik_phone = $request->klinik_phone;
            $clinic->klinik_therapist = $request->therapiest;
            $clinic->klinik_open_close = $request->open_close;
            $clinic->klinik_time_per_day = $request->time_per_day;
            $clinic->latitude = $request->latitude;
            $clinic->longitude = $request->longitude;
            $clinic->save();

            $lengTp = count($request->therapy);
            for ($i=0; $i < $lengTp ; $i++) {
                // dd($request->therapy[$i] );
                if($request->price[$i] != null && $request->therapy[$i] != null){
                    $therapy = new Therapy();
                    $therapy=Therapy::where('user_id',$request->user_id)->first();
                    $therapy->price = $request->price[$i];
                    $therapy->therapy_name = strtolower($request->therapy[$i]);
                    $therapy->user_id = $request->user_id;
                    $therapy->save();
                }
            }
            return redirect()->route('klinik');
    }

    public function laporan(Request $request)
    {
        // dd(date('Y-m-d', strtotime("-7 days")));
        $data['orders'] = DB::table('orders')
            ->where(function ($query) use ($request) {
                if(Auth::user()->role=='KLINIK'){
                    $query->where('klinik_id',Auth::id());
                }
                
                if ($request->date == "Hari Ini") {
                    $query->whereDate('updated_at',date('Y-m-d'));
                }
                elseif($request->date == "Seminggu"){
                    $query->whereDate('updated_at','>',date('Y-m-d', strtotime("-7 days")));
                }
                elseif($request->date == "Sebulan"){
                    $query->whereDate('updated_at','>',date('Y-m-d', strtotime("-30 days")));
                }else{
                    
                }
            })
            // ->sum('therapy_price');
            ->get();
        $data['sum'] = DB::table('orders')
            ->where(function ($query) use ($request) {
                if(Auth::user()->role=='KLINIK'){
                    $query->where('klinik_id',Auth::id());
                }

                if ($request->date == "Hari Ini") {
                    $query->whereDate('updated_at',date('Y-m-d'));
                }
                elseif($request->date == "Seminggu"){
                    $query->whereDate('updated_at','>',date('Y-m-d', strtotime("-7 days")));
                }
                elseif($request->date == "Sebulan"){
                    $query->whereDate('updated_at','>',date('Y-m-d', strtotime("-30 days")));
                }else{
                    
                }
            })
            ->sum('therapy_price');

            // dd($data);

        return view('backend.admin.laporan',$data);
    }

    public function delete($id)
    {
        DB::table('users')->where('id',$id)->delete();
        DB::table('clinics')->where('user_id',$id)->delete();
        DB::table('therapis')->where('user_id',$id)->delete();
    }
}
