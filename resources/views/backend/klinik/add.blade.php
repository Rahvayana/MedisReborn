@extends('layouts.backend')
@section('title', 'Klinik add')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend')}}/plugins/dropify/dropify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
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
<div class="row">
    <div class="col-12">
        <h4 class="text-black">Form Input Mitra Klinik</h4>
        <span class="m-3 pull-right">
        </span>
    </div>
</div>
<form action="{{route('klinik-save')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- {{ csrf_field() }} -->

    <div class="row">
        <div class="col-lg-5">
            <fieldset class="form-group">
                <label>Nama Klinik</label>
                <input class="form-control" id="klinik-name" type="text" name="klinik_name" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>Nama Pemilik</label>
                <input class="form-control" id="klinik-owner" type="text" name="owner_name" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>No Ho Pemilik</label>
                <input class="form-control" id="klinik-owner-phone" type="text" name="owner_phone" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>Izin Usaha</label>
                <input class="form-control" id="klinik-permission" type="text" name="permission" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>Alamat</label>
                <input class="form-control" id="klinik-address" type="text" name="address" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>No Telepon Klinik</label>
                <input class="form-control" id="klinik-address" type="text" name="klinik_phone" placeholder="" required>
            </fieldset>
        </div>
        <div class="col-lg-5">
            <fieldset class="form-group">
                <label class=" align-items-center">
                    <center> Input Jenis Pengobatan Yang tersedia</center>
                </label>
                <div class="row">
                    <div class="col-md-6">
                        Pengobatan
                        <input class="form-control" id="therapy-1" type="text" name="therapy[0]" placeholder="" value="akupuntur"><br>
                        <input class="form-control" id="therapy-2" type="text" name="therapy[1]" placeholder="" value="pijat"><br>
                        <input class="form-control" id="therapy-3" type="text" name="therapy[2]" placeholder="" value="bekam">

                    </div>
                    <div class="col-md-6">
                        Harga
                        <input class="form-control" id="price-1" type="text" name="price[0]" placeholder=""><br>
                        <input class="form-control" id="price-2" type="text" name="price[1]" placeholder=""><br>
                        <input class="form-control" id="price-3" type="text" name="price[2]" placeholder=""><br>

                    </div>
                </div>
            </fieldset>
            <fieldset class="form-group">
                <label>Input Jumlah Therapist</label>
                <input class="form-control" id="klinik-therapiest" type="number" name="therapiest" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>Input Jadwal Buka Tutup ( ex: Senin-Jumat )</label>
                <input class="form-control" id="klinik-open-close" type="text" name="open_close" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>No Pembagian Waktu Perhari ( ex: 08:00 am to 09:00 pm ) </label>
                <input class="form-control" id="klinik-time-per-day" type="text" name="time_per_day" placeholder="" required>
            </fieldset>
        </div>

    </div>
    <div class="row">
        <div class="col-5">
            <hr>
            <p>Field Untuk Login Klinik</p>
            <fieldset class="form-group">
                <label>Email</label>
                <input class="form-control" id="klinik-address" type="text" name="email" placeholder="" required>
            </fieldset>
            <fieldset class="form-group">
                <label>Password</label>
                <input class="form-control" id="klinik-address" type="password" name="password" placeholder="" required>
            </fieldset>
            <span class="pull-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </span>
        </div>
        <div class="col-lg-5 col-md-5">
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
</form>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crop Your Merk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
    <script src="{{URL::asset('backend')}}/plugins/dropify/dropify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
            var $modal = $('#modal');
            var iconMerk = $('#iconMerk');
            var image = document.getElementById('image');
            var cropper;

            $("body").on("change", ".image", function (e) {
                var files = e.target.files;
                var done = function (url) {
                    image.src = url;
                    $modal.modal('show');
                };
                var reader;
                var file;
                var url;

                if (files && files.length > 0) {
                    file = files[0];

                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function (e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            $modal.on('shown.bs.modal', function () {
                cropper = new Cropper(image, {
                    aspectRatio: 16 / 16,
                    viewMode: 3,
                    preview: '.preview'
                });
            }).on('hidden.bs.modal', function () {
                cropper.destroy();
                cropper = null;
            });

            $("#crop").click(function () {
                canvas = cropper.getCroppedCanvas({
                    width: 200,
                    height: 200,
                });

                canvas.toBlob(function (blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function () {
                        var base64data = reader.result;
                        iconMerk.val(base64data)
                        $modal.modal('hide');
                    }
                });
            })
        });
    </script>
@endsection
