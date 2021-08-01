@extends('layouts.frontend')
@section('content')
<section id="pricing" class="pricing mt-5">
<div class="album py-5 bg-light">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Tabel Transaksi</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Klinik</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$order->klinik_name}}</td>
                        <td>{{$order->tanggal_pengobatan}}</td>
                        <td>{{$order->jam_pengobatan}}</td>
                        <td>{{$order->total_payment}}</td>
                        <td><a href="{{ route('profile.transaksi', $order->id) }}" class="btn btn-outline-primary">Detail</a></td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <h3>Profile</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" value="{{$user->name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="{{$user->email}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection