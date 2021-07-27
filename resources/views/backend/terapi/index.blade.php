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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($terapis as $terapi)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$terapi->name}}</td>
                        <td><img src="/uploads/terapi/{{$terapi->image}}" alt="" width="20%"></td>
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
@endsection
