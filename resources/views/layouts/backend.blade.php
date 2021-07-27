<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Medic Reborn - @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

    <!-- v4.0.0-alpha.6 -->
    <link rel="stylesheet" href="{{URL::asset('backend')}}/bootstrap/css/bootstrap.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::asset('backend')}}/css/style.css">
    <link rel="stylesheet" href="{{URL::asset('backend')}}/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::asset('backend')}}/css/et-line-font/et-line-font.css">
    <link rel="stylesheet" href="{{URL::asset('backend')}}/css/themify-icons/themify-icons.css">
    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="skin-blue sidebar-mini">
    <div class="wrapper boxed-wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index.html" class="logo blue-bg">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="{{URL::asset('backend')}}/img/logo-n-blue.png" alt=""></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="{{URL::asset('backend')}}/img/logo-blue.png" alt=""></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar blue-bg navbar-static-top">
                <!-- Sidebar toggle button-->
                <ul class="nav navbar-nav pull-left">
                    <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a> </li>
                </ul>
                <div class="pull-left search-box">
                    <form action="#" method="get" class="search-form">
                        <div class="input-group">
                            <input name="search" class="form-control" placeholder="Search..." type="text">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
                            </span>
                        </div>
                    </form>
                    <!-- search form -->
                </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="{{URL::asset('backend')}}/img/img1.jpg" class="user-image" alt="User Image"> <span class="hidden-xs">{{Auth::user()->name}}</span> </a>
                            <ul class="dropdown-menu">
                              <li class="user-header">
                                <div class="pull-left user-img"><img src="{{URL::asset('backend')}}/img/img1.jpg" class="img-responsive" alt="User"></div>
                                <p class="text-left">{{Auth::user()->name}}<small>{{Auth::user()->email}}</small> </p>
                              </li>
                              <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                {{ __('Logout') }}
                                </a>
                              </li>
                              
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="{{ Route::currentRouteNamed('admin') ? 'active' : '' }}"> <a href="{{ route('admin') }}"> <i class="fa fa-home"></i> <span>Dashboard</span></a>
                    </li>
                    @if (Auth::user()->role=='ADMIN')
                    <li class="treeview {{ Route::currentRouteNamed('klinik*') ? 'active' : '' }}"> <a href="#"> <i class="fa fa-drivers-license"></i> <span>Admin</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li class="{{ Route::currentRouteNamed('klinik') ? 'active' : '' }}"><a href="{{ route('klinik') }}">List Klinik</a></li>
                            <li class="{{ Route::currentRouteNamed('admin.transaksi') ? 'active' : '' }}"><a href="{{ route('admin.transaksi') }}">Transaksi</a></li>
                            <li class="{{ Route::currentRouteNamed('laporan.keuangan') ? 'active' : '' }}"><a href="{{ route('laporan.keuangan') }}">Laporan Keuangan</a></li>
                        </ul>
                    </li>  
                    <li class="treeview"> <a href="#"> <i class="fa  fa-hospital-o"></i> <span>Klinik</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('klinik') }}">List Klinik</a></li>
                            <li><a href="{{ route('pasien') }}">Pasien</a></li>
                        </ul>
                    </li>
                    <li class="treeview"> <a href="#"> <i class="fa  fa fa-id-badge"></i> <span>Terapi</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('terapi.list') }}">List Klinik</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="treeview"> <a href="#"> <i class="fa  fa-stethoscope"></i> <span>Pasien</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('pasien.list') }}">List Pasien</a></li>
                            @if (Auth::user()->role=='KLINIK')
                            <li><a href="{{ route('laporan.keuangan') }}">Laporan Keuangan</a></li>
                            @endif
                        </ul>
                    </li>
                    @if (Auth::user()->role=='ADMIN')
                    <li class="treeview"> <a href="#"> <i class="fa fa-user-circle-o"></i> <span>Customer</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('pasien') }}">List Customer</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header sty-one">
                <h1>@yield('title')</h1>
                <ol class="breadcrumb">
                    <li>@yield('title')</li>
                </ol>
            </div>

            <!-- Main content -->
            <div class="content">
                <!-- Small boxes (Stat box) -->
                @yield('content')

            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">Version 1.2</div>
            Copyright © 2017 Yourdomian. All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{URL::asset('backend')}}/js/jquery.min.js"></script>

    <!-- v4.0.0-alpha.6 -->
    <script src="{{URL::asset('backend')}}/bootstrap/js/bootstrap.min.js"></script>

    <!-- template -->
    <script src="{{URL::asset('backend')}}/js/niche.js"></script>

    <!-- Morris JavaScript -->
    <script src="{{URL::asset('backend')}}/plugins/raphael/raphael-min.js"></script>
    <script src="{{URL::asset('backend')}}/plugins/morris/morris.js"></script>
    <script src="{{URL::asset('backend')}}/plugins/functions/morris-init.js"></script>
    @yield('js')

</body>

</html>
