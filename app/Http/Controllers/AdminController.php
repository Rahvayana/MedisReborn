<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

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
}
