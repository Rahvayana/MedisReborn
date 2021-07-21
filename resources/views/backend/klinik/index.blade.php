@extends('layouts.backend')
@section('title', 'Klinik')
@section('content')
<div class="row">
    @if (Auth::user()->role=='ADMIN')
    <div class="col-12">
        <h4 class="text-black">List</h4>
        <span class="m-3 pull-right">
            <a href="{{ route('klinik-add')}}" class="btn btn-rounded btn-success">Tambah</a>
        </span>
    </div>
    @else
        
    @endif
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kliniks as $klinik)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td><a href="{{ route('klinik.detail',$klinik->id) }}">{{$klinik->klinik_name}}</a></td>
                        <td>{{$klinik->klinik_phone}}</td>
                        <td>{{$klinik->email}}</td>
                        <td>{{$klinik->klinik_owner}}</td>
                        <td>{{$klinik->klinik_owner_phone}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
