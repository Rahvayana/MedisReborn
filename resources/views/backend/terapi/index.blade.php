@extends('layouts.backend')
@section('title', 'Terapi')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="text-black">List Terapi</h4>
        <span class="m-3 pull-right">
            <a data-toggle="modal" href="#" data-target="#exampleModal" class="btn btn-rounded btn-success">Tambah</a>
        </span>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($terapis as $key=>$terapi)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$terapi->name}}</td>
                        <td><img src="/uploads/terapi/{{$terapi->image}}" alt="" width="200px"></td>
                        <td>
                          <a href="#"><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#update-terapi{{$key}}"><i class="fa fa-pencil"></i></button></a>
                          <a href="#"><button type="button" data-record-id="{{$terapi->id}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-secondary"><i class="fa fa-trash"></i></button></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Terapi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('terapi.store') }}" method="POST" enctype="multipart/form-data">@csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Terapi</label>
                  <input type="text" name="terapi" class="form-control" id="exampleInputEmail1" placeholder="Jenis Terapi">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Image</label>
                  <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@foreach ($terapis as $key=>$terapi)
<div class="modal fade" id="update-terapi{{$key}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Terapi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('terapi.update',$terapi->id) }}" method="POST" enctype="multipart/form-data">@csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Jenis Terapi</label>
                <input type="text" name="terapi" value="{{$terapi->name}}" class="form-control" id="exampleInputEmail1" placeholder="Jenis Terapi">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" name="image" class="form-control" id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach


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
            
            $.post('/admin/terapi-delete/' + id).then()
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
