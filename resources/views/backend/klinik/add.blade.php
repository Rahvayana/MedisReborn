@extends('layouts.backend')
@section('title', 'Klinik add')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="text-black">Form Input Mitra Klinik</h4>
        <span class="m-3 pull-right">
        </span>
        <p>Add <code class="highlighter-rouge">.table-hover</code> to enable a hover state on table rows within a <code class="highlighter-rouge">&lt;tbody&gt;</code>.</p>
    </div>
</div>
<form action="{{route('klinik-save')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- {{ csrf_field() }} -->

    <div class="row">
        <div class="col-lg-5">
            <fieldset class="form-group">
                <label>Nama Klinik</label>
                <input class="form-control" id="klinik-name" type="text" name="klinik_name" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>Nama Pemilik</label>
                <input class="form-control" id="klinik-owner" type="text" name="owner_name" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>No Ho Pemilik</label>
                <input class="form-control" id="klinik-owner-phone" type="text" name="owner_phone" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>Izin Usaha</label>
                <input class="form-control" id="klinik-permission" type="text" name="permission" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>Alamat</label>
                <input class="form-control" id="klinik-address" type="text" name="address" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>No Telepon Klinik</label>
                <input class="form-control" id="klinik-address" type="text" name="klinik_phone" placeholder="" required>
            </fieldset>
        </div>
        <div class="col-lg-5">
            <fieldset class="form-group">
                <label class=" align-items-center">
                    <center> Input Jenis Pengobatan Yang tersedia</center>
                </label>
                <div class="row">
                    <div class="col-md-6">
                        Pengobatan
                        <input class="form-control" id="therapy-1" type="text" name="therapy[0]" placeholder="" required><br>
                        <input class="form-control" id="therapy-2" type="text" name="therapy[1]" placeholder=""><br>
                        <input class="form-control" id="therapy-3" type="text" name="therapy[2]" placeholder="">

                    </div>
                    <div class="col-md-6">
                        Harga
                        <input class="form-control" id="price-1" type="text" name="price[0]" placeholder="" required><br>
                        <input class="form-control" id="price-2" type="text" name="price[1]" placeholder=""><br>
                        <input class="form-control" id="price-3" type="text" name="price[2]" placeholder=""><br>

                    </div>
                </div>
            </fieldset>
            <fieldset class="form-group">
                <label>Input Jumlah Therapist</label>
                <input class="form-control" id="klinik-therapiest" type="number" name="therapiest" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>Input Jadwal Buka Tutup ( ex: Senin-Jumat )</label>
                <input class="form-control" id="klinik-open-close" type="text" name="open_close" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>No Pembagian Waktu Perhari ( ex: 08:00 am to 09:00 pm ) </label>
                <input class="form-control" id="klinik-time-per-day" type="text" name="time_per_day" placeholder="" required>
            </fieldset>
        </div>

    </div>
    <div class="row">
        <div class="col-6">
            <hr>
            <p>Field Untuk Login Klinik</p>
            <fieldset class="form-group">
                <label>Email</label>
                <input class="form-control" id="klinik-address" type="text" name="email" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>Password</label>
                <input class="form-control" id="klinik-address" type="password" name="password" placeholder="" required>
            </fieldset>
            <span class="pull-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </span>
        </div>
    </div>
</form>



@endsection
