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
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                    @php $no = 1; @endphp
                    @if(count($produk) < 1)
                    <tr class="text-center">
                        <td colspan="6">Data Tidak Tersedia</td>
                    </tr>
                    @else
                    @foreach($produk as $prod)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $prod->nama_produk }}</td>
                        <td>{{ $prod->nama_kategori }}</td>
                        <td>Rp {{ number_format($prod->harga,0) }}</td>
                        <td>{{ $prod->stok }} Pcs</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-primary">Ubah</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            {{$produk->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
</div>

@endsection
