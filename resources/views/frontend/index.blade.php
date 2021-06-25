@extends('layouts.frontend')
@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <h1>Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
            etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" style="width: 18rem;">
                    <img class="card-img-top" src="{{URL::asset('frontend')}}/akupuntur.jpg" alt="Card image cap">
                    <div class="card-body m-2 ">
                        <h5 class="card-title font-weight-bold-">Akupuntur</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's
                            content.</p>
                        <a href="{{ route('search-akupuntur')}}" class="btn btn-primary">Cari</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" style="width: 18rem;">
                    <img class="card-img-top" src="{{URL::asset('frontend')}}/bekam.jpg" alt="Card image cap">
                    <div class="card-body m-2 ">
                        <h5 class="card-title font-weight-bold-">Bekam</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's
                            content.</p>
                        <a href="{{ route('search-bekam')}}" class="btn btn-primary">Cari</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" style="width: 18rem;">
                    <img class="card-img-top" src="{{URL::asset('frontend')}}/pijat.jpg" alt="Card image cap">
                    <div class="card-body m-2 ">
                        <h5 class="card-title font-weight-bold-">Pijat</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's
                            content.</p>
                        <a href="{{ route('search-pijat')}}" class="btn btn-primary">Cari</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
