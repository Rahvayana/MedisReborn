@extends('layouts.frontend')
@section('css')
@endsection
@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Cari Lokasi Klinik Terdekat</h1>
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
            <div class="col-12">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{URL::asset('frontend')}}/akupuntur.jpg" class="img-fluid" alt="" width="200" height="200">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Description</p>
                                <a href="#" class="btn btn-primary">BUTTON</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
