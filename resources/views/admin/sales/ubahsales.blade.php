@extends('layouts.index')
@section('content')
 <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="modalSales">Ubah Sales</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('postUbahSales', [$sales->id]) }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group row mb-2">
                <label for="" class="label-form-col col-md-2 col-sm-12">Nama Sales</label>
                <div class="col-md-10 col-sm-12">
                    <input type="text" class="form-control" name="nama" value="{{ $sales->nama}}" placeholder="Nama Sales">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="" class="label-form-col col-md-2 col-sm-12">Username</label>
                <div class="col-md-10 col-sm-12">
                    <input type="text" max="13" class="form-control" name="username" value="{{ $sales->username}}" placeholder="Username Sales">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="" class="label-form-col col-md-2 col-sm-12">No Ktp</label>
                <div class="col-md-10 col-sm-12">
                    <input type="text" max="16" class="form-control" value="{{ $sales->no_ktp}}" name="no_ktp" placeholder="No Ktp Sales">
                </div>
            </div>
            {{-- <div class="form-group row mb-2">
                <label for="" class="label-form-col col-md-2 col-sm-12">Toko</label>
                <div class="col-md-10 col-sm-12">
                    <select name="id_toko" class="form-control" id="sales">
                        <option value="#">Pilih Satu</option>
                        @foreach ($toko as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_toko }}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
  </div>
  @stop
