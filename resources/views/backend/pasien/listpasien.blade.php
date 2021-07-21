@extends('layouts.backend')
@section('title', 'Pasien')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="text-black">List</h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Terapi</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">No Urut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasiens as $pasien)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$pasien->name}}</td>
                        <td>{{$pasien->email}}</td>
                        <td>{{$pasien->order_id}}</td>
                        <td>{{$pasien->therapy_name}}</td>
                        <td>{{$pasien->tanggal_pengobatan}}</td>
                        <td>{{$pasien->jam_pengobatan}}</td>
                        <td>{{$pasien->no_urut}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
