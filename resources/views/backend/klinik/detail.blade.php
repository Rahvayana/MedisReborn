@extends('layouts.backend')
@section('content')
<div class="content-header sty-one">
    <h1>Klinik</h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('klinik') }}">Klinik</a></li>
      <li><i class="fa fa-angle-right"></i> Klinik Detail</li>
    </ol>
</div>
<div class="content">
    <div class="row">
       <div class="col-md-12">
        <div class="card">
            <img src="{{URL::asset('uploads')}}/{{$klinik->photo}}" width="20%" alt="Profile User" style="display: block; margin: auto">
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{$klinik->name}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{$klinik->email}}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td>{{$klinik->klinik_phone}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td>{{$klinik->klinik_address}}</td>
                </tr>
                <tr>
                    <td>Klinik Owner</td>
                    <td>:</td>
                    <td>{{$klinik->klinik_owner}}</td>
                </tr>
            </table>
        </div>
       </div>
    </div>
</div>
@endsection