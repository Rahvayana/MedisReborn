@extends('layouts.backend')
@section('title', 'Klinik')
@section('content')
<div class="row">
    @if (Auth::user()->role=='ADMIN')
    <div class="col-12">
        <h4 class="text-black">List</h4>
        <span class="m-3 pull-right">
            <a href="{{ route('klinik-add')}}" class="btn btn-rounded btn-success">Tambah</a>
        </span>
    </div>
    @else
        
    @endif
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Klinik Name</th>
                        <th scope="col">Klinik Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Owner</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kliniks as $klinik)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td><a href="{{ route('klinik.detail',$klinik->id) }}">{{$klinik->klinik_name}}</a></td>
                        <td>{{$klinik->klinik_phone}}</td>
                        <td>{{$klinik->email}}</td>
                        <td>{{$klinik->klinik_owner}}</td>
                        <td>
                            <a href="{{ route('klinik.edit', $klinik->id) }}"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil"></i></button></a>
                            <a href="#"><button type="button" data-record-id="{{$klinik->id}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-secondary"><i class="fa fa-trash"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter">Hapus Event</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger btn-ok">Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $('#confirm-delete').on('click', '.btn-ok', function(e) {
            var $modalDiv = $(e.delegateTarget);
            var id = $(this).data('recordId');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.post('/admin/delete/klinik/' + id).then()
            $modalDiv.addClass('loading');
            setTimeout(function() {
                location.reload();            
            })
        });
        $('#confirm-delete').on('show.bs.modal', function(e) {
            var data = $(e.relatedTarget).data();
            $('.btn-ok', this).data('recordId', data.recordId);
        });
    </script>
@endsection