@extends('layouts.index')
@section('content')
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="modalProduk">Ubah Produk</h5>
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="{{ route('postUbahProduk', [$produk->id]) }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="modal-body">
        <div class="form-group row mb-2">
            <label for="" class="label-form-col col-md-2 col-sm-12">Nama Produk</label>
            <div class="col-md-10 col-sm-12">
                <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" value="{{$produk->nama_produk}}">
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="" class="label-form-col col-md-2 col-sm-12">Kategori</label>
            <div class="col-md-10 col-sm-12">
                <select name="id_kategori" class="form-control" id="">
                    <option value="#">Pilih Satu</option>
                    @foreach ($kategori as $items)
                        <option value="{{ $items->id }}">{{ $items->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="" class="label-form-col col-md-2 col-sm-12">Toko</label>
            <div class="col-md-10 col-sm-12">
                <select name="id_toko" class="form-control" id="produk">
                    <option value="#">Pilih Satu</option>
                    @foreach ($toko as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_toko }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="" class="label-form-col col-md-2 col-sm-12">Harga</label>
            <div class="col-md-10 col-sm-12">
                <input type="text" max="13" class="form-control" name="harga" value="{{$produk->harga}}" placeholder="Harga">
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="" class="label-form-col col-md-2 col-sm-12">Stok Produk</label>
            <div class="col-md-10 col-sm-12">
                <input type="number" min="1" class="form-control" name="stok" placeholder="Stok Produk" value="{{$produk->stok}}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
</div>
@stop
