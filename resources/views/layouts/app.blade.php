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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Roboto',
        }
    </style>
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

<main role="main" class="mt-5">
    @yield('content')

</main>
<!-- jQuery 3 -->
<script src="{{URL::asset('backend')}}/js/jquery.min.js"></script>

<!-- v4.0.0-alpha.6 -->
<script src="{{URL::asset('backend')}}/bootstrap/js/bootstrap.min.js"></script>

@yield('js')

</body>

</html>
