@extends('layouts.frontend')
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Pengobatan Tradisional Diera Modern</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Medis Reborn Bermimpi Dapat Melahirkan Kembali Pengobatan Tradisional Dengan Inovasi Ilmu Pengetahuan Dan Teknologi Terkini Medis Reborn</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="/assets/img/healthcare-doctor.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

<!-- ======= Values Section ======= -->
<section id="values" class="values">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Layanan Kami</h2>
        <p>Beragam Jenis Terapi Yang Bisa Kalian Pilih</p>
      </header>

      <div class="row">

        @foreach ($terapis as $terapi)
        <div class="col-lg-4">
          <form action="{{ route('search-terapi',strtolower($terapi->name)) }}" method="POST">@csrf
            <input type="hidden" name="latlong" id="latlong">
            <div class="box" data-aos="fade-up" data-aos-delay="200">
              <img src="{{URL::asset('uploads/terapi')}}/{{$terapi->image}}" class="img-fluid" alt="">
              <h3>{{$terapi->name}}</h3>
              <button type="submit" class="btn btn-primary" style="width: 100%">Cari</a>
            </div>
          </form>
        </div>
        @endforeach

      </div>
    </div>
  </section>
<!-- End Values Section -->
@endsection

@section('js')


<script>
  $( document ).ready(function() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
      }

    function showPosition(position) {
      $("#latlong").val(position.coords.latitude+","+position.coords.longitude)
      console.log(position.coords.latitude+","+position.coords.longitude)
      
    }
});
</script>
@endsection
