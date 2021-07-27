<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>{{ config('app.name', 'Medis Reborn') }}</title>


    <link rel="stylesheet" href="{{URL::asset('backend')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{URL::asset('backend')}}/css/font-awesome/css/font-awesome.min.css">
    @yield('css')



    <!-- Bootstrap core CSS -->

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .container {
            max-width: 960px;
        }
        html {
             font-size: 14px;
        }
        @media (min-width: 768px) {
        html {
            font-size: 16px;
        }
        }

        .shadow-sm{box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important}

    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    @php
        $terapis=\App\Terapi::all();
        // dd($terapis);
    @endphp

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm ">
        <h5>MEDIS REBORN</h5>
        <nav class="navbar navbar-expand-lg navbar-light bg-white" style="margin: auto">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('landing')}}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/gabung-mitra">Gabung Mitra Klinik</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/tentang-kami">Tentang Kami</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Layanan
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @foreach ($terapis as $terapi)
                      <a class="dropdown-item" href="{{ route('search-terapi',strtolower($terapi->name) ) }}">{{$terapi->name}}</a>
                      @endforeach
                  </div>
                </li>
              </ul>
              @guest
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              @if (Route::has('register'))
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              @endif
              @else
              <span class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>
  
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                   document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
  
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </span>
              <span class="nav-item">
                  <a href="{{ route('profile') }}">
                     Profile
                  </a>
              </span>
              @endguest
            </div>
          </nav>
    </div>

<main role="main">
    @yield('content')

</main>

<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
          MEDIS <br> REBORN
            <small class="d-block mb-3 text-muted">&copy;2021</small>
        </div>
        <div class="col-6 col-md">
            <h5>Follow Us</h5>
            <ul class="list-unstyled text-small">

                <li>
                    <i class="fa fa-instagram" aria-hidden="true"></i> &nbsp;
                    <a class="text-muted" href="#">Medis Reborn</a>
                </li>
                <li>
                    <i class="fa fa-facebook" aria-hidden="true"></i> &nbsp; &nbsp;
                    <a class="text-muted" href="#">Medis Reborn</a>
                </li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Tentang Medis Reborn</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Cara Pesan</a></li>
                <li><a class="text-muted" href="#">Hubungi Kami</a></li>
            </ul>
        </div>
    </div>
</footer>


<!-- jQuery 3 -->
<script src="{{URL::asset('backend')}}/js/jquery.min.js"></script>

<!-- v4.0.0-alpha.6 -->
<script src="{{URL::asset('backend')}}/bootstrap/js/bootstrap.min.js"></script>

@yield('js')

</body>

</html>
