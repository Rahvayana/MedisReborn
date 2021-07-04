@extends('layouts.frontend')
@section('css')
<link rel="stylesheet" href="{{URL::asset('backend')}}/plugins/dropify/dropify.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"
    integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
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

<div class="album py-5 bg-light">

    <div class="container">
        <h1 class="m-3">Konfirmasi Pembayaran</h1>
        <div class="row">
            <div class="col-12">
                <div class="card p-4">

                    <form action="{{route('payment-save')}}" method="POST" class="form-horizontal">@csrf
                        <div class="form-body">
                            <input type="hidden" name="order_id" value="{{$order->id}}">
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">ID Pesanan</label>
                                <div class="col-md-7">
                                    {{ $order->order_id }}
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">Nama</label>
                                <div class="col-md-7">
                                    {{ $order->name }}
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">No Hp/Wa.</label>
                                <div class="col-md-7">
                                    {{ $order->phone }}
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">Klinik</label>
                                <div class="col-md-7">
                                    {{ $order->klinik_name }}
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">Pengobatan</label>
                                <div class="col-md-7">
                                    {{ $order->therapy_name }}
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">Total Pembayaran</label>
                                <div class="col-md-7">
                                    {{ $order->therapy_price }}
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">Tangal Pengobatan</label>
                                <div class="col-md-7">
                                    {{ $order->tanggal_pengobatan }}
                                </div>
                            </fieldset>

                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-3 font-weight-bold">Waktu Pengobatan</label>
                                <div class="col-md-7">
                                    akan diverifikasi oleh admin setelah anda melakukan pembayaran
                                </div>
                            </fieldset>

                            <fieldset class="form-group row">
                                <label class="control-label text-right col-md-10">Silahkan Transfer Ke Rekening Medis Reborn Berikut : <span class="font-weight-bold">BRI:  382381703 an fsldf</span> </label>
                            </fieldset>
                            <fieldset class="form-group row">
                                <div class="col-md-3"></div>
                                <div class="col-md-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-black">Upload Foto Klinik</h4>
                                            <label for="input-file-max-fs">Your so fresh input file</label>
                                            <input type="file" class="image dropify" id="fileInput" accept="image/*" name="foto_klinik" required
                                            data-max-file-size="2M" />
                                            <input type="hidden" name="iconMerk" id="iconMerk" />

                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-primary">Buat Pesanan</button>
                                </div>
                            </fieldset>

                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
</div>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"
    integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
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
