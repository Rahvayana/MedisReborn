<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Therapy;
use App\Models\User;
use App\Models\Order;
use Auth;
class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function orderPage($klinik_id){
        $klinik_id = (int)$klinik_id;
        $data["klinik"] = DB::table('users')
            ->select(
                'users.id',
                'users.klinik_name',
                'users.klinik_address',
                'users.photo',
                'users.klinik_open_close',
                'users.klinik_time_per_day',
            )
            ->where('users.id', '=', $klinik_id)
            ->first();

        $data["therapy"] = Therapy::where('user_id', $klinik_id)
            ->get();
        return view('frontend.order.index', $data);

    }

    public function generate(Request $request){
        $orderId ="TRF" . str_replace("-","" ,$request->tanggal) .strtotime(now());
        $therapy = Therapy::where('id', (int)$request->jenis_pengobatan)->first();
        $order = new Order();
        $order->order_id = $orderId;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->therapy_name = $therapy->therapy_name;
        $order->klinik_name = $request->klinik_name;
        $order->therapy_price = $therapy->price;
        $order->tanggal_pengobatan = $request->tanggal;
        $order->klinik_id = $request->klinik_id;
        $order->user_id = Auth::user()->id;
        $order->save();

        return redirect("/page/order/payment/". $orderId);
    }

    public function paymentPage($order_id){
        $data['order'] = Order::where('order_id', $order_id)->first();
        return view('frontend.order.payment', $data);
    }

    public function paymentSave(Request $request){
        $folderPath = public_path('uploads/bukti_transfer/');

        $image_parts = explode(";base64,", $request->iconMerk);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $filename = uniqid() . '.png';
        $file = $folderPath . $filename;
        $uploadMerkIcon = file_put_contents($file, $image_base64);
        $order = Order::find((int)$request->order_id);
        $order->bukti_transfer = 'bukti_transfer/' . $filename;
        $order->save();
        return redirect()->route('after-transfer');
    }

    public function afterTransfer(){
        return view('frontend.order.after_payment');
    }
}
