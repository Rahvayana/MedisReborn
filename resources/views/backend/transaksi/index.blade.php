@extends('layouts.backend')
@section('title', 'order')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="text-black">List Transaksi</h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Nama Klinik</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td><a href="{{ route('admin.detail', $order->id) }}">{{$order->name}}</a></td>
                        <td>{{$order->klinik_name}}</td>
                        <td>{{$order->tanggal_pengobatan}}</td>
                        <td>{{$order->jam_pengobatan}}</td>
                        <td>
                            @if ($order->bukti_transfer)
                                Review Bukti TF
                            @else
                                Belum Ada Bukti TF
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
