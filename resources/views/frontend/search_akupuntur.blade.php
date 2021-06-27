@extends('layouts.frontend')
@section('css')
@endsection
@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Cari Lokasi Klinik Akupuntur Terdekat</h1>
                <form action="" accept-charset="UTF-8" method="get">
                    <div class="input-group">
                        <input type="text" name="search" id="search" value=""
                            placeholder="klinik name" class="form-control">
                        <span class="input-group-btn">
                            <input type="submit" name="commit" value="Search" class="btn btn-primary" data-disable-with="Search">
                        </span>
                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">
            @foreach ($kliniks as $klinik)
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-auto m-1">
                            <style>
                                #foto {
                                    border: 1px solid #ddd;
                                    border-radius: 4px;
                                    padding: 5px;
                                }
                            </style>
                            <img id="foto" src="{{URL::asset('uploads')}}/{{$klinik->photo}}" class="img-fluid" alt="" width="200" height="200">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="ml-3 card-title font-weight-bold"><u> {{$klinik->klinik_name}} </u></h4>
                                <style>
                                    table {
                                        width: 80%;
                                    }
                                    th, td {
                                        padding: 8px;
                                    }
                                    td {
                                          border-left: 1px solid black;
                                    }
                                </style>
                                <table>
                                    <tr>
                                        <td>
                                            No telp: &nbsp; {{$klinik->klinik_phone}}
                                        </td>
                                        <td>
                                            Alamat: &nbsp; {{$klinik->klinik_address}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Pemilik: &nbsp; {{$klinik->klinik_owner}}
                                        </td>
                                        <td class="font-weight-bold">
                                            Jenis Terapi:&nbsp; {{$klinik->therapy_name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah Terapis: &nbsp; {{$klinik->klinik_therapist}}
                                        </td>
                                        <td>
                                            Hari Buka: &nbsp; {{$klinik->klinik_open_close}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Price: &nbsp; {{$klinik->price}}
                                        </td>
                                        <td>
                                            Jam Buka: &nbsp; {{$klinik->klinik_time_per_day}}
                                        </td>
                                    </tr>
                                </table><br>


                                <a href="/page/order/{{$klinik->id}}" class="btn btn-primary">BUTTON</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
