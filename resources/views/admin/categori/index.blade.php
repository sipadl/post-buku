@extends('layouts.index')
@section('content')
<div class="card">
    <div class="row">
        <div class="card-header">
                <div class="col-9">
                    <h4 class="card-title">Kategori Produk</h4>
                </div>
                <div class="col-3">
                    <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalKategori">Tambah</a>
                </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-md">
                <tbody>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                    @php $no = 1; @endphp
                    @if(count($categori) < 1)
                    <tr class="text-center">
                        <td colspan="3">Data Tidak Tersedia</td>
                    </tr>
                    @else
                    @foreach($categori as $cat)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $cat->nama_kategori }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-primary">Ubah</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
