@extends('layouts.index')
@section('content')
<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="modalToko">Ubah Toko</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('postUbahToko',[$toko->id]) }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group row mb-2">
                <label for="" class="label-form-col col-md-2 col-sm-12">Nama Toko</label>
                <div class="col-md-10 col-sm-12">
                    <input type="text" class="form-control" name="nama_toko" value="{{$toko->nama_toko}}" placeholder="Nama Toko">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="" class="label-form-col col-md-2 col-sm-12">Telp Toko</label>
                <div class="col-md-10 col-sm-12">
                    <input type="text" max="13" class="form-control" name="no_telp" value="{{$toko->no_telp}}" placeholder="Telp Toko">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="" class="label-form-col col-md-2 col-sm-12">Email Toko</label>
                <div class="col-md-10 col-sm-12">
                    <input type="text" max="13" class="form-control" name="email"  value="{{$toko->email}}" placeholder="Email Toko">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="" class="label-form-col col-md-2 col-sm-12">Alamat Toko</label>
                <div class="col-md-10 col-sm-12">
                    <textarea type="text" class="form-control" name="alamat" rows="3" cols="2" placeholder="Alamat">{{$toko->alamat}}</textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
  </div>
@stop
