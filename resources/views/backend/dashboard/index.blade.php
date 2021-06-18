@extends('layouts.backend')
@section('content')
<div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Username</th>
          <th scope="col">Role</th>
          <th scope="col">Country</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Alexander</td>
          <td>Orton</td>
          <td>@mdorton</td>
          <td>Admin</td>
          <td>USA</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>John Deo</td>
          <td>Deo</td>
          <td>@johndeo</td>
          <td>User</td>
          <td>USA</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Randy Orton</td>
          <td>the Bird</td>
          <td>@twitter</td>
          <td>admin</td>
          <td>UK</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Randy Mark</td>
          <td>Ottandy</td>
          <td>@mdothe</td>
          <td>user</td>
          <td>AUS</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>Ram Jacob</td>
          <td>Thornton</td>
          <td>@twitter</td>
          <td>admin</td>
          <td>IND</td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection