@extends('layouts.backend')
@section('title', 'Klinik')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="text-black">List</h4>
        <span class="m-3 pull-right">
            <a href="{{ route('klinik-add')}}" class="btn btn-rounded btn-success">Tambah</a>
        </span>
        <p>Add <code class="highlighter-rouge">.table-hover</code> to enable a hover state on table rows within a <code class="highlighter-rouge">&lt;tbody&gt;</code>.</p>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Klinik Name</th>
                        <th scope="col">Klinik Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Owner Phone</th>
                        <th scope="col">Izin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jumlah Therapist</th>
                        <th scope="col">Jadwal Buka-Tutup</th>
                        <th scope="col">Waktu Perhari</th>
                        <th scope="col">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    {{$no = 1}}
                    @foreach ($kliniks as $klinik)
                    <tr>
                        <th scope="row">{{$no}}</th>
                        <td>{{$klinik->klinik_name}}</td>
                        <td>{{$klinik->klinik_phone}}</td>
                        <td>{{$klinik->email}}</td>
                        <td>{{$klinik->klinik_owner}}</td>
                        <td>{{$klinik->klinik_owner_phone}}</td>
                        <td>{{$klinik->klinik_permission}}</td>
                        <td>{{$klinik->klinik_address}}</td>
                        <td>{{$klinik->klinik_therapist}}</td>
                        <td>{{$klinik->klinik_open_close}}</td>
                        <td>{{$klinik->klinik_time_per_day}}</td>
                        <td><img src="{{URL::asset('uploads')}}/{{$klinik->photo}}" style="max-width: 80px;max-height: 80px;"></td>
                    </tr>
                    {{$no++}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
