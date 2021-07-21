<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
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
