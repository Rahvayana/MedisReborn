@extends('layouts.frontend')
@section('css')
@endsection
@section('content')
<section id="pricing" class="pricing mt-5">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>KLINIK</h2>
        <p>Semua Klinik Tentang</p>
      </header>

      <div class="row gy-4" data-aos="fade-left">
      @foreach ($kliniks as $klinik)
        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="box">
            <h3 style="color: #07d5c0;">{{$klinik->klinik_name}}</h3>
            <img id="foto" src="{{URL::asset('uploads')}}/{{$klinik->photo}}" class="img-fluid" alt="" width="200" height="200">
            <img src="assets/img/pricing-free.png" class="img-fluid" alt="">
            <ul>
              <li>No telp: &nbsp; {{$klinik->klinik_phone}}</li>
              <li>Pemilik: &nbsp; {{$klinik->klinik_owner}}</li>
              <li>Harga: &nbsp; Rp. {{number_format($klinik->price)}}</li>
            </ul>
            <a href="/page/order/{{$klinik->id}}/{{$klinik->therapy_name}}" class="btn-buy">PESAN</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </section><!-- End Pricing Section -->

@endsection
