@extends('layouts.index')
@section('content')
<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="modalKategori">Download Laporan</h5>
        <div class="card">
            {{-- <div class="row"> --}}
                <a class="btn btn-primary"href="{{ route('laporan.create') }}"> Download Laporan</a>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
