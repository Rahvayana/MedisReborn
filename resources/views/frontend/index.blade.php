@extends('layouts.frontend')
@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="carimedis">Cari</label>
                    <input type="text" class="form-control" id="carimedis" placeholder="Cari Pengobatan">
                  </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" style="width: 18rem;">
                    <img class="card-img-top" src="{{URL::asset('frontend')}}/akupuntur.jpg" alt="Card image cap">
                    <div class="card-body m-2 ">
                        <h5 class="card-title font-weight-bold-">Akupuntur</h5>
                        <a href="{{ route('search-akupuntur')}}" class="btn btn-primary">Cari</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" style="width: 18rem;">
                    <img class="card-img-top" src="{{URL::asset('frontend')}}/bekam.jpg" alt="Card image cap">
                    <div class="card-body m-2 ">
                        <h5 class="card-title font-weight-bold-">Bekam</h5>
                        <a href="{{ route('search-bekam')}}" class="btn btn-primary">Cari</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" style="width: 18rem;">
                    <img class="card-img-top" src="{{URL::asset('frontend')}}/pijat.jpg" alt="Card image cap">
                    <div class="card-body m-2 ">
                        <h5 class="card-title font-weight-bold-">Pijat</h5>
                        <a href="{{ route('search-pijat')}}" class="btn btn-primary">Cari</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
