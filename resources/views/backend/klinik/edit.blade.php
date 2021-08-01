@extends('layouts.backend')
@section('css')
<link rel="stylesheet" href="/backend/plugins/formwizard/jquery-steps.css">
<link rel="stylesheet" href="{{URL::asset('backend')}}/plugins/dropify/dropify.min.css">
    <style>
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }
    </style>
@endsection
@section('content')
<div class="content">
    <div class="info-box">
      <h4 class="text-black m-b-3">Step wizard</h4>
      <div id="demo">
        <div class="step-app">
          <ul class="step-steps">
            <li><a href="#step1"><span class="number">1</span> Klinik Info</a></li>
            <li><a href="#step3"><span class="number">3</span> Clinics Therapy</a></li>
          </ul>
          <div class="step-content">
              <div class="step-tab-panel" id="step1">
                <form method="POST" action="{{route('klinik.update',$klinik->id)}}" id="my_form" enctype="multipart/form-data">@csrf
                    <input type="hidden" value="{{$klinik->user_id}}" name="user_id" id="">
                <div class="row m-t-2">
                   <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                          <h4 class="text-black">Upload Foto Klinik</h4>
                          <label for="input-file-max-fs">Your so fresh input file</label>
                          <input type="file" class="image dropify" id="fileInput" accept="image/*" name="foto_klinik" required data-max-file-size="2M"/>
                            <input type="hidden" name="iconMerk" id="iconMerk" />
            
                        </div>
                      </div>
                   </div>
                </div>
                <div class="row m-t-2">
                  <div class="col-md-6">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label>Nama Klinik</label>
                            <input class="form-control" id="klinik-name" type="text" value="{{$klinik->klinik_name}}" name="klinik_name" placeholder="" required>
                        </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label>Nama Pemilik</label>
                            <input class="form-control" id="klinik-owner" type="text" value="{{$klinik->name}}" name="owner_name" placeholder="" required>
                        </fieldset>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label>No HP Pemilik</label>
                            <input class="form-control" id="klinik-owner-phone" value="{{$klinik->klinik_owner_phone}}" type="text" name="owner_phone" placeholder="" required>
                        </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label>No Telepon Klinik</label>
                            <input class="form-control" id="klinik-address" type="text" value="{{$klinik->klinik_phone}}" name="klinik_phone" placeholder="" required>
                        </fieldset>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label>Izin Usaha</label>
                            <input class="form-control" id="klinik-permission" type="text" value="{{$klinik->klinik_permission}}" name="permission" placeholder="" required>
                        </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label>Alamat</label>
                            <input class="form-control" id="klinik-address" type="text" name="address" value="{{$klinik->klinik_address}}" placeholder="" required>
                        </fieldset>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label>Input Jumlah Therapist</label>
                            <input class="form-control" id="klinik-therapiest" type="number" name="therapiest" value="{{$klinik->klinik_therapist}}" placeholder="" required>
                        </fieldset>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label>Input Jadwal Buka Tutup</label>
                            <input class="form-control" id="klinik-open-close" type="text" name="open_close" value="{{$klinik->klinik_open_close}}" placeholder="" required>
                        </fieldset>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label>No Pembagian Waktu Perhari </label>
                            <input class="form-control" id="klinik-time-per-day" max="13" type="text" value="{{$klinik->klinik_time_per_day}}" name="time_per_day" placeholder="" required>
                        </fieldset>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label>Latitude</label>
                            <input class="form-control" id="klinik-permission" type="text" value="{{$klinik->latitude}}" name="latitude" placeholder="" required>
                        </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label>Longitude</label>
                            <input class="form-control" id="klinik-address" type="text" value="{{$klinik->longitude}}" name="longitude" placeholder="" required>
                        </fieldset>
                    </div>
                  </div>
                </div>
            </div>
            
            <div class="step-tab-panel" id="step3">
                <div class="row m-t-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="int1">Pengobatan :</label>
                            <select name="therapy[]" id="therapy" class="form-control">
                              @foreach ($terapis as $terapi)
                              <option value="{{strtolower($terapi->name)}}">{{$terapi->name}}</option>
                              @endforeach
                            </select><br>
                            <select name="therapy[]" id="therapy" class="form-control">
                              @foreach ($terapis as $terapi)
                              <option value="{{strtolower($terapi->name)}}">{{$terapi->name}}</option>
                              @endforeach
                            </select><br>
                            <select name="therapy[]" id="therapy" class="form-control">
                              @foreach ($terapis as $terapi)
                              <option value="{{strtolower($terapi->name)}}">{{$terapi->name}}</option>
                              @endforeach
                            </select><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="intType1">Harga Pengobatan :</label>
                            <input class="form-control" id="price-1" type="text" name="price[]" placeholder=""><br>
                            <input class="form-control" id="price-2" type="text" name="price[]" placeholder=""><br>
                            <input class="form-control" id="price-3" type="text" name="price[]" placeholder=""><br>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </form>
          <div class="step-footer">
              <button data-direction="prev" class="btn btn-light">Previous</button>
              <button data-direction="next" class="btn btn-primary">Next</button>
              <button data-direction="finish" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </div>
    </div>
    <!-- Main row --> 
</div>
@endsection
@section('js')
<script src="/backend/plugins/formwizard/jquery-steps.js"></script> 
<script src="{{URL::asset('backend')}}/plugins/dropify/dropify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#demo').steps({
        onFinish: function () {
            $("#my_form").submit()
        }
        });
        $('.dropify').dropify();
    });
  </script>

@endsection