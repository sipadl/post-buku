@extends('layouts.index')
@section('content')
<div class="card row">
        <h4 class="card-title col-md-8 col-sm-12 p-4">Transaksi</h4>
        <div class="col-md-4 col-sm-12">
            <a class="btn btn-primary w-100" href="#" data-toggle="modal" data-target="#modalTransaksi">Transaksi Baru</a>
        </div>
    <br>
    <div class="col-md-12 col-sm-12">
        <div class="table-responsive p-2">
            <table class="table table-bordered table-md">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>No. Transaksi</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($transaksis as $item)
                    <tr class="text-center">
                        <td>{{$no++}}</td>
                        <td>{{$item->kode_transaksi}}</td>
                        <td>{{$item->nama_produk}}</td>
                        <td>{{number_format($item->harga,0)}}</td>
                        <td>{{$item->jumlah}}</td>
                        <td>{{number_format($item->total,0)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$transaksis->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
</div>
@endsection
