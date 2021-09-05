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
                        <td>
                            @if ($order->bukti_transfer)
                                {{$order->total_payment}}
                            @else
                                Upload Bukti Pembayaran
                            @endif
                        </td>
                        <td><a href="{{ route('payment-order', $order->order_id) }}" class="btn btn-outline-primary">Detail</a></td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <h3>Profile</h3>
            <form action="{{ route('profile.update') }}" method="POST">@csrf
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" readonly class="form-control" id="email" value="{{$user->email}}">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</section>
@endsection