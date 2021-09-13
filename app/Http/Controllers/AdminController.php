<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Terapi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        if(Auth::user()->role=='PASIEN'){
            return redirect()->route('landing');
        }
        if(Auth::user()->role=='ADMIN'){
            $data['today']=DB::table('orders')->whereDate('tanggal_pengobatan',date('Y-m-d'))->where('total_payment','Sukses')->count();
            $data['pasien']=DB::table('users')->where('role','PASIEN')->count();
            $data['klinik']=DB::table('users')->where('role','KLINIK')->count();
            $data['transaksi']=DB::table('orders')->where('total_payment','Sukses')->sum('therapy_price');
    
            $data['olds']=DB::table('orders')->whereDate('tanggal_pengobatan','<',date('Y-m-d'))->where('total_payment','Sukses')->get();
            $data['days']=DB::table('orders')->whereDate('tanggal_pengobatan',date('Y-m-d'))->where('total_payment','Sukses')->get();
            $data['soons']=DB::table('orders')->whereDate('tanggal_pengobatan','>',date('Y-m-d'))->where('total_payment','Sukses')->get();
            return view('backend.admin.index',$data);
        }else{
            $data['today']=DB::table('orders')->whereDate('tanggal_pengobatan',date('Y-m-d'))->where('total_payment','Sukses')->where('klinik_id',Auth::id())->count();
            $data['pasien']=DB::table('orders')->where('klinik_id',Auth::id())->count();
            $data['transaksi']=DB::table('orders')->where('total_payment','Sukses')->where('klinik_id',Auth::id())->sum('therapy_price');
            
            $data['olds']=DB::table('orders')->whereDate('tanggal_pengobatan','<',date('Y-m-d'))->where('total_payment','Sukses')->where('klinik_id',Auth::id())->get();
            $data['days']=DB::table('orders')->whereDate('tanggal_pengobatan',date('Y-m-d'))->where('total_payment','Sukses')->where('klinik_id',Auth::id())->get();
            $data['soons']=DB::table('orders')->whereDate('tanggal_pengobatan','>',date('Y-m-d'))->where('total_payment','Sukses')->where('klinik_id',Auth::id())->get();
            // dd($data);
            return view('backend.klinik.admin',$data);
        }
    }

    public function transaksi()
    {
        $data['orders']=Order::orderBy('updated_at','DESC')->get();
        // dd($data);
        return view('backend.transaksi.index',$data);
    }

    public function detail($id)
    {
        $data['order']=Order::find($id);
        // dd($data);
        return view('backend.transaksi.detail',$data);
    }

    public function konfirmasi($id,Request $request)
    {
        $order=new Order();
        $order=Order::find($id);
        $order->total_payment=$request->review;
        $order->pesan=$request->pesan;
        $order->total_payment='Sukses';
        $order->save();
        return redirect()->route('admin.transaksi');
    }

    public function pasien()
    {
        $data['pasiens']=DB::table('users')->where('role','PASIEN')->get();
        return view('backend.pasien.index',$data);
    }


    public function listpasien()
    {
        if(Auth::user()->role=='KLINIK'){
            $data['pasiens']=DB::table('orders')
            ->select('orders.*','users.name','users.email')
            ->leftJoin('users','users.id','orders.user_id')
            ->where('total_payment','Sukses')
            ->where('tanggal_pengobatan', '>=', date('Y-m-d'))
            ->where('klinik_id',Auth::id())->get();
        }else{
            $data['pasiens']=DB::table('orders')
            ->select('orders.*','users.name','users.email')
            ->leftJoin('users','users.id','orders.user_id')
            ->where('total_payment','Sukses')
            ->where('tanggal_pengobatan', '>=', date('Y-m-d'))->get();
        }
        // dd($data);
        return view('backend.pasien.listpasien',$data);
    }

    public function terapi()
    {
        $data['terapis']=Terapi::all();
        return view('backend.terapi.index',$data);
    }
    
    public function terapiStore(Request $request)
    {
        // dd($request);
        $file = $request->file('image');
        $fileName=time().'.'.$file->getClientOriginalExtension();
        if ($request->hasFile('image')) {
            $path = public_path().'/uploads/terapi/';
            // dd($path);
            $file->move($path,$fileName);
        }
        $terapi=new Terapi();
        $terapi->name=$request->terapi;
        $terapi->image=$fileName;
        $terapi->save();
        return redirect()->route('terapi.list');
    }

    public function terapiUpdate(Request $request,$id)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName=time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/uploads/terapi/';
            // dd($path);
            $file->move($path,$fileName);
        }
        $terapi=new Terapi();
        $terapi=Terapi::find($id);
        $terapi->name=$request->terapi;
        if ($request->hasFile('image')) {
            $terapi->image=$fileName;
        }
        $terapi->save();
        return redirect()->route('terapi.list');
    }

    public function delete($id)
    {
        DB::table('terapis')->where('id',$id)->delete();
    }

}
