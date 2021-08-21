@extends('layouts.frontend')
@section('content')
<section id="pricing" class="pricing mt-5">
<div class="album py-5 bg-light">
<div class="container">
    <div class="row">
        <div class="col-md-12">
         <div class="card">
             @if ($order->bukti_transfer)
             <img src="{{URL::asset('uploads')}}/{{$order->bukti_transfer}}" width="100%" alt="Profile User" style="display: block; margin: auto">
             @endif
             <table class="table">
                 <tr>
                     <td>Nama Pasien</td>
                     <td>:</td>
                     <td>{{$order->name}}</td>
                 </tr>
                 <tr>
                     <td>Nama Klinik</td>
                     <td>:</td>
                     <td>{{$order->klinik_name}}</td>
                 </tr>
                 <tr>
                     <td>Jenis Therapy</td>
                     <td>:</td>
                     <td>{{$order->therapy_name}}</td>
                 </tr>
                 <tr>
                     <td>Tanggal</td>
                     <td>:</td>
                     <td>{{$order->tanggal_pengobatan}}</td>
                 </tr>
                 <tr>
                     <td>Jam</td>
                     <td>:</td>
                     <td>{{$order->jam_pengobatan}}</td>
                 </tr>
                 <tr>
                     <td>No Urut</td>
                     <td>:</td>
                     <td>{{$order->no_urut}}</td>
                 </tr>
                 <tr>
                     <td>Pesan</td>
                     <td>:</td>
                     <td>{{$order->pesan}}</td>
                 </tr>
                 @if (!$order->bukti_transfer)
                 <fieldset class="form-group row">
                    <div class="col-md-12">
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
                 @endif
             </table>
         </div>
        </div>
     </div>
</div>
</div>
</section>
@endsection