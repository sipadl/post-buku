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
                <tbody>
                    <tr class="text-center">
                        <th>No</th>
                        <th>No. Transaksi</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
