@extends('layouts.frontend')
@section('content')

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">
            @foreach ($terapis as $terapi)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" style="width: 18rem;">
                    <img class="card-img-top" src="{{URL::asset('uploads/terapi')}}/{{$terapi->image}}" alt="Card image cap">
                    <div class="card-body m-2 ">
                        <h5 class="card-title font-weight-bold-">{{$terapi->name}}</h5>
                        <a href="{{ route('search-terapi',strtolower($terapi->name)) }}" class="btn btn-primary">Cari</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
