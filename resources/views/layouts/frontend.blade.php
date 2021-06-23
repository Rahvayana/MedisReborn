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
    <link href="pricing.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm ">
        <h5 class="my-0 mr-md-auto font-weight-normal">MEDIS REBORN</h5>
        <nav class="my-0 mr-md-auto font-weight-normal">
            <a class="p-2 text-dark" href="#">Home</a>
            <a class="p-2 text-dark" href="#">Layanan</a>
            <a class="p-2 text-dark" href="#">Gabung Mitra Klinik</a>
            <a class="p-2 text-dark" href="#">Tentang Kami</a>
        </nav>
        <a class="btn btn-outline-primary" href="#">Sign up</a>
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


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="/docs/4.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>


</body>

</html>
