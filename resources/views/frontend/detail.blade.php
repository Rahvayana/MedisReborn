@extends('layouts.frontend')
@section('content')
<div class="album py-5 bg-light">
<div class="container">
    <div class="row">
        <div class="col-md-12">
         <div class="card">
             <img src="{{URL::asset('uploads')}}/{{$order->bukti_transfer}}" width="100%" alt="Profile User" style="display: block; margin: auto">
             <table class="table">
                 <tr>
                     <td>Nama Pasien</td>
                     <td>:</td>
                     <td>{{$order->name}}</td>
                 </tr>
                 <tr>
                     <td>Nama Klinik</td>
                     <td>:</td>
                     <td>{{$order->klinik_name}}</td>
                 </tr>
                 <tr>
                     <td>Jenis Therapy</td>
                     <td>:</td>
                     <td>{{$order->therapy_name}}</td>
                 </tr>
                 <tr>
                     <td>Tanggal</td>
                     <td>:</td>
                     <td>{{$order->tanggal_pengobatan}}</td>
                 </tr>
                 <tr>
                     <td>Jam</td>
                     <td>:</td>
                     <td>{{$order->jam_pengobatan}}</td>
                 </tr>
                 <tr>
                     <td>No Urut</td>
                     <td>:</td>
                     <td>{{$order->no_urut}}</td>
                 </tr>
                 <tr>
                     <td><a href="{{ route('admin.transaksi.confirm',$order->id) }}" class="btn btn-primary">Konfirmasi</a></td>
                 </tr>
             </table>
         </div>
        </div>
     </div>
</div>
</div>
@endsection