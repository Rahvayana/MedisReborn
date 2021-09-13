@extends('layouts.backend')
@section('content')
<div class="content-header sty-one">
    <h1>Transaksi</h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.transaksi') }}">Transaksi</a></li>
      <li><i class="fa fa-angle-right"></i> Transaksi Detail</li>
    </ol>
</div>
<div class="content">
    <div class="row">
       <div class="col-md-12">
        <div class="card">
            @if ($order->bukti_transfer)
            <img src="{{URL::asset('uploads')}}/{{$order->bukti_transfer}}" width="100%" alt="Profile User" style="display: block; margin: auto">
            @else
            <h1 style="text-align: center">Belum ada Bukti Transaksi</h1>
            @endif
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
                <form action="{{ route('admin.transaksi.confirm',$order->id) }}" method="POST">@csrf
                <tr>
                    <td>
                        <select name="review" id="review" class="form-control">
                            <option value="Konfirmasi Pembayaran">Konfirmasi Pembayaran</option>
                            <option value="Pembayaran Gagal">Pembayaran Gagal</option>
                        </select>
                    </td>
                    <td>
                        <textarea name="pesan" id="pesan" placeholder="Catatan Transaksi" class="form-control"></textarea>
                    </td>
                    <td>
                        <button class="btn btn-primary" type="submit">Konfirmasi</button>
                    </td>
                </tr>
                </form>
            </table>
        </div>
       </div>
    </div>
</div>
@endsection