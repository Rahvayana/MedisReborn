@extends('layouts.backend')
@section('css')
<link href="/css/tabs.css" rel="stylesheet">
@endsection
@section('content')
<div class="content"> 
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-4 col-sm-6 col-xs-12">
      <div class="info-box bg-darkblue"> <span class="info-box-icon bg-transparent"><i class="ti-stats-up text-white"></i></span>
        <div class="info-box-content">
          <h6 class="info-box-text text-white">Pasien Hari Ini</h6>
          <h1 class="text-white">{{$today}}</h1>
        <!-- /.info-box-content --> 
      </div>
      <!-- /.info-box --> 
    </div>
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-sm-6 col-xs-12">
      <div class="info-box bg-green text-white"> <span class="info-box-icon bg-transparent"><i class="ti-face-smile"></i></span>
        <div class="info-box-content">
          <h6 class="info-box-text text-white">Total Pasien</h6>
          <h1 class="text-white">{{$pasien}}</h1>
        <!-- /.info-box-content --> 
      </div>
      <!-- /.info-box --> 
    </div>
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-sm-6 col-xs-12">
      <div class="info-box bg-orange"> <span class="info-box-icon bg-transparent"><i class="ti-money"></i></span>
        <div class="info-box-content">
          <h6 class="info-box-text text-white">Total Transaksi</h6>
          <h1 class="text-white">Rp. {{number_format($transaksi)}}</h1>
        <!-- /.info-box-content --> 
      </div>
      <!-- /.info-box --> 
    </div>
    </div>
    <!-- /.col --> 
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body p-b-0">
          <h4 class="card-title text-black text-center">Transaksi History</h4>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs customtab" role="tablist" style="display: flex; margin: auto;">
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#yesterday" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Transaksi Kemarin</span></a> </li>
          <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#today" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Transaksi Hari Ini</span></a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tomorrow" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Transaksi Besok</span></a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane p-20" id="yesterday" role="tabpanel">
              <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Nama Klinik</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($olds as $old)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><a href="{{ route('admin.detail', $old->id) }}">{{$old->name}}</a></td>
                            <td>{{$old->klinik_name}}</td>
                            <td>{{$old->tanggal_pengobatan}}</td>
                            <td>{{$old->jam_pengobatan}}</td>
                            <td>
                                @if ($old->bukti_transfer)
                                    Review Bukti TF
                                @else
                                    Belum Ada Bukti TF
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
          </div>
          <div class="tab-pane active" id="today" role="tabpanel">
            <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama Pasien</th>
                          <th scope="col">Nama Klinik</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Jam</th>
                          <th scope="col">Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($days as $old)
                      <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td><a href="{{ route('admin.detail', $old->id) }}">{{$old->name}}</a></td>
                          <td>{{$old->klinik_name}}</td>
                          <td>{{$old->tanggal_pengobatan}}</td>
                          <td>{{$old->jam_pengobatan}}</td>
                          <td>
                              @if ($old->bukti_transfer)
                                  Review Bukti TF
                              @else
                                  Belum Ada Bukti TF
                              @endif
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane p-20" id="tomorrow" role="tabpanel">
            <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama Pasien</th>
                          <th scope="col">Nama Klinik</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Jam</th>
                          <th scope="col">Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($soons as $old)
                      <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td><a href="{{ route('admin.detail', $old->id) }}">{{$old->name}}</a></td>
                          <td>{{$old->klinik_name}}</td>
                          <td>{{$old->tanggal_pengobatan}}</td>
                          <td>{{$old->jam_pengobatan}}</td>
                          <td>
                              @if ($old->bukti_transfer)
                                  Review Bukti TF
                              @else
                                  Belum Ada Bukti TF
                              @endif
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection