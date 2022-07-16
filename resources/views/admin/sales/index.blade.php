@extends('layouts.index')
@section('content')
<div class="card">
    <div class="row">
        <div class="card-header">
                <div class="col-9">
                    <h4 class="card-title">Data Sales</h4>
                </div>
                <div class="col-3">
                    <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalSales">Tambah</a>

                </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-md">
                <tbody>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Sales</th>
                        <th>Toko</th>
                        <th>Aksi</th>
                    </tr>
                    @php $no = 1; @endphp
                    @if(count($data) < 1)
                    <tr class="text-center">
                        <td colspan="6">Data Tidak Tersedia</td>
                    </tr>
                    @else
                    @foreach($data as $sales)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $sales->nama }}</td>
                        <td>{{ $sales->nama_toko }}</td>
                        <td class="text-center">
                            <a href="{{ route('ubahSales', [$sales->id]) }}" class="btn btn-primary">Ubah</a>
                            <a href="{{ route('deleteSales' ,[$sales->id]) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            {{$data->links('vendor.pagination.bootstrap-4')}}

        </div>
    </div>
</div>

@endsection
