
@extends('layouts.index')
@section('content')
 <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="modalKategori">Ubah Kategori</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('postUbahKategori', [$kategori->id]) }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group row">
                <label for="" class="label-form-col col-md-2 col-sm-12">Kategori</label>
                <div class="col-md-10 col-sm-12">
                    <input type="text" class="form-control" value="{{ $kategori->nama_kategori }}" name="nama_kategori">
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
