<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
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
            return view('backend.klinik.admin',$data);
        }
    }

    public function transaksi()
    {
        $data['orders']=Order::all();
        // dd($data);
        return view('backend.transaksi.index',$data);
    }

    public function detail($id)
    {
        $data['order']=Order::find($id);
        // dd($data);
        return view('backend.transaksi.detail',$data);
    }

    public function konfirmasi($id)
    {
        $order=new Order();
        $order=Order::find($id);
        $order->total_payment='Sukses';
        $order->save();
        return back();
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

}
