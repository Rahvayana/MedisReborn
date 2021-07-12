@extends('layouts.frontend')
@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <h1>Selamat Datang di Klinik {{$klinik->klinik_name}}</h1>
        <p class="lead text-muted">
           Alamat: {{$klinik->klinik_address}} <br>
            buka: <strong class="font-weight-bold">{{$klinik->klinik_open_close}} </strong>
            jam: <strong class="font-weight-bold">{{$klinik->klinik_time_per_day}}</strong>
    </div>
</section>

<div class="album py-5 bg-light">

    <div class="container">
        <div class="row">
            <div class="col-12">
                    <form action="{{route('order-generate')}}" method="POST" class="form-horizontal">@csrf
                        <div class="form-body">
                            <input type="hidden" name="klinik_id" value="{{$klinik->id}}">
                            <input type="hidden" name="klinik_name" value="{{$klinik->klinik_name}}">
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">Nama</label>
                                <div class="col-md-7">
                                    <input class="form-control" id="name" type="text" name="name" placeholder="" required>
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">No Hp/WA</label>
                                <div class="col-md-7">
                                    <input class="form-control" id="phone" type="text" name="phone" placeholder="" required>
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">Jenis Pengobatan</label>
                                <div class="col-md-7">
                                    <select class="form-control custom-select" name="jenis_pengobatan" required>
                                        <option value="" selected disabled>Pilih Pengobatan</option>
                                        @foreach($therapy as $t)
                                        @if ($t->therapy_name==$jenis_terapi)
                                            <option selected value="{{$t->id}}">{{$t->therapy_name}}  &nbsp&nbsp&nbsp | &nbsp Rp. {{number_format($t->price,2,',','.')}} </option>
                                        @else
                                            <option value="{{$t->id}}">{{$t->therapy_name}}  &nbsp&nbsp&nbsp | &nbsp Rp. {{number_format($t->price,2,',','.')}} </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">Tentukan Jadwal</label>
                            </fieldset>
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">Tanggal Pengobatan</label>
                                <div class="col-md-7">
                                    <input class="form-control" id="date" type="date" name="tanggal" placeholder="" required>
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">Waktu Pengobatan</label>
                                <div class="col-md-7">
                                    <select name="time" id="time" class="form-control">
                                        @for ($i = 0; $i < $klinik->klinik_time_per_day; $i++)
                                        <option value="{{$jam[$i]}}">{{$jam[$i]}}</option>
                                        @endfor
                                    </select>
                                    
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                            <div class="col-md-5">
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-primary">Buat Pesanan</button>
                            </div>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection
