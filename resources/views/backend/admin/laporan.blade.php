@extends('layouts.backend')
@section('title', 'Pasien')
@section('content')
<div class="row">
    <div class="col-md-12 mb-5">
    <form action="{{ route('laporan.keuangan') }}" method="POST" id="form">@csrf
            <select id="mySelect" name="date" onchange="myFunction()" class="form-control">
                <option value="Semua">Semua Transaksi</option>
                <option value="Hari Ini">Hari Ini</option>
                <option value="Seminggu">1 Minggu Yang Lalu</option>
                <option value="Sebulan">1 Bulan Yang Lalu</option>
            </select>
        </form>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Nama Klinik</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><a href="{{ route('admin.detail', $order->id) }}">{{$order->name}}</a></td>
                                <td>{{$order->klinik_name}}</td>
                                <td>{{$order->tanggal_pengobatan}}</td>
                                <td>{{$order->jam_pengobatan}}</td>
                                <td>
                                    Rp. {{number_format($order->therapy_price)}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Total Transaksi</th>
                                <th scope="col">Potongan</th>
                                <th scope="col"></th>
                                <th scope="col">Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Total Transaksi</td>
                            <td>:</td>
                            <td>Rp. {{number_format($sum)}}</td>
                            <td>-7%</td>
                            <td>:</td>
                            @if (Auth::user()->role=='KLINIK')
                            <td>Rp. {{number_format($sum-($sum*0.07))}}</td>
                            @else
                            <td>Rp. {{number_format(($sum*0.07))}}</td>
                            @endif
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        function myFunction() {
            document.getElementById("form").submit();
        }
</script>
@endsection
