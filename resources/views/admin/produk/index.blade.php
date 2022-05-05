@extends('layouts.index')
@section('content')
<div class="card">
    <div class="row">
        <div class="card-header">
                <div class="col-9">
                    <h4 class="card-title">Data Produk</h4>
                </div>
                <div class="col-3">
                    <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalProduk">Tambah</a>

                </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-md">
                <tbody>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Baju</td>
                        <td>Rp. 100.000</td>
                        <td>10</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
