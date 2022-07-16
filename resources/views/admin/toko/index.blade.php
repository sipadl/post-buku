@extends('layouts.index')
@section('content')
<div class="card">
    <div class="row">
        <div class="card-header">
                <div class="col-9">
                    <h4 class="card-title">Data Toko</h4>
                </div>
                <div class="col-3">
                    <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalToko">Tambah</a>

                </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-md">
                <tbody>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Email Toko</th>
                        <th>No Toko</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    @php $no = 1; @endphp
                    @if(count($toko) < 1)
                    <tr class="text-center">
                        <td colspan="6">Data Tidak Tersedia</td>
                    </tr>
                    @else
                    @foreach($toko as $tok)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $tok->nama_toko }}</td>
                        <td>{{ $tok->email }}</td>
                        <td>{{ $tok->no_telp }}</td>
                        <td>{{ $tok->alamat }}</td>
                        <td class="text-center">
                            <a href="{{ route('ubahToko', [$tok->id]) }}" class="btn btn-primary">Ubah</a>
                            <a href="{{ route('deleteToko', [$tok->id]) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            {{$toko->links('vendor.pagination.bootstrap-4')}}

        </div>
    </div>
</div>

@endsection
