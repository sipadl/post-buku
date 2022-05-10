<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Ecommerce Dashboard &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  {{-- <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css"> --}}

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ @asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{  @asset('assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            {{-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> --}}
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
              <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Result
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png" alt="product">
                  oPhone S9 Limited Edition
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">
                  Headphone Blitz
                </a>
              </div>
              <div class="search-header">
                Projects
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                  </div>
                  Stisla Admin Template
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                  </div>
                  Create a new Homepage Design
                </a>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Admin</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="/profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="/pengaturan" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Pengaturan
              </a>
              <div class="dropdown-divider"></div>
              <a href="/keluar" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Home</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Home</li>
              <li class="nav-item dropdown active">
                <a href="/" class="nav-link"><i class="fas fa-fire"></i><span>Home</span></a>
              </li>
              <li class="menu-header">Administrator</li>
              <li><a class="nav-link" href="/kategori"><i class="far fa-square"></i> <span>Kategori</span></a></li>
              <li><a class="nav-link" href="/produk"><i class="far fa-square"></i> <span>Produk</span></a></li>
              <li><a class="nav-link" href="/sales"><i class="far fa-square"></i> <span>Sales</span></a></li>
              <li><a class="nav-link" href="/toko"><i class="far fa-square"></i> <span>Toko</span></a></li>
              <li class="menu-header">Sales</li>
              <li class="nav-item dropdown">
                <a href="/transaksi" class="nav-link"><i class="fas fa-fire"></i><span>Transaksi</span></a>
                <a href="/laporan" class="nav-link"><i class="fas fa-fire"></i><span>Laporan</span></a>
              </li>
              <li class="menu-header">Akun</li>
              <li class="nav-item dropdown">
                <a href="/pengaturan" class="nav-link"><i class="fas fa-fire"></i><span>Pengaturan</span></a>
                <a href="/profile" class="nav-link"><i class="fas fa-fire"></i><span>Profile</span></a>
                <a href="/logout" class="nav-link"><i class="fas fa-fire"></i><span>Keluar</span></a>
              </li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Stisla</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  @php
    $toko = \App\Models\Toko::all();
    $kategori = \App\Models\Categori::all();
    $produk = \App\Models\Produk::all();
  @endphp

  {{-- Modal Produk --}}
  <div class="modal fade" id="modalProduk" tabindex="-1" role="dialog" aria-labelledby="modalProduk" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalProduk">Tambah Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('produk.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Nama Produk</label>
                    <div class="col-md-10 col-sm-12">
                        <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk">
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
                        <input type="text" max="13" class="form-control" name="harga" placeholder="Harga">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Stok Produk</label>
                    <div class="col-md-10 col-sm-12">
                        <input type="number" min="1" class="form-control" name="stok" placeholder="Stok Produk" value="1">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- Modal Sales --}}
  <div class="modal fade" id="modalSales" tabindex="-1" role="dialog" aria-labelledby="modalSales" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSales">Tambah Sales</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('sales.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Nama Sales</label>
                    <div class="col-md-10 col-sm-12">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Sales">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Username</label>
                    <div class="col-md-10 col-sm-12">
                        <input type="text" max="13" class="form-control" name="username" placeholder="Username Sales">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Password</label>
                    <div class="col-md-10 col-sm-12">
                        <input type="password" max="13" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">No Ktp</label>
                    <div class="col-md-10 col-sm-12">
                        <input type="text" max="16" class="form-control" name="no_ktp" placeholder="No Ktp Sales">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Toko</label>
                    <div class="col-md-10 col-sm-12">
                        <select name="id_toko" class="form-control" id="sales">
                            <option value="#">Pilih Satu</option>
                            @foreach ($toko as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_toko }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- Modal Toko --}}
  <div class="modal fade" id="modalToko" tabindex="-1" role="dialog" aria-labelledby="modalToko" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalToko">Tambah Toko</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('toko.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Nama Toko</label>
                    <div class="col-md-10 col-sm-12">
                        <input type="text" class="form-control" name="nama_toko" placeholder="Nama Toko">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Telp Toko</label>
                    <div class="col-md-10 col-sm-12">
                        <input type="text" max="13" class="form-control" name="no_telp" placeholder="Telp Toko">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Email Toko</label>
                    <div class="col-md-10 col-sm-12">
                        <input type="text" max="13" class="form-control" name="email" placeholder="Email Toko">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Alamat Toko</label>
                    <div class="col-md-10 col-sm-12">
                        <textarea type="text" class="form-control" name="alamat" rows="3" cols="2" placeholder="Alamat"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- Modal Kategori --}}
  <div class="modal fade" id="modalKategori" tabindex="-1" role="dialog" aria-labelledby="modalKategori" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalKategori">Tambah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('kategori.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Kategori</label>
                    <div class="col-md-10 col-sm-12">
                        <input type="text" class="form-control" name="nama_kategori">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- Modal Transaksi --}}
  <div class="modal fade" id="modalTransaksi" tabindex="-1" role="dialog" aria-labelledby="modalTransaksi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTransaksi">Tambah Sales</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('transaksi.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Nama Pembeli</label>
                    <div class="col-md-10 col-sm-12">
                        <input type="text" class="form-control" name="nama_pembeli" placeholder="Nama Pembeli">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Produk</label>
                    <div class="col-md-10 col-sm-12">
                        <select name="id_produk" class="form-control" id="transaksi">
                            <option value="#">Pilih Satu</option>
                            @foreach ($produk as $itemx)
                            <option value="{{ $itemx->id }}">{{ $itemx->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="" class="label-form-col col-md-2 col-sm-12">Jumlah</label>
                    <div class="col-md-10 col-sm-12">
                        <input type="number" max="99" min="1" class="form-control qty" name="jumlah" value="1">
                    </div>
                </div>
                <div class="produk">
                    <div class="card">
                        <p>
                            <span id="nama_produk">Produk</span><br>
                            Toko <span id="nama_toko">index</span><br>
                            Harga : <span id="harga_produk"></span>
                        </p>
                    </div>
                    <div class="text-end jumlah">
                        <h6>Total Bayar : <span id="total"></span></h6>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ @asset('assets/js/stisla.js') }}"></script>


  <!-- Template JS File -->
  <script src="{{ @asset('/assets/js/scripts.js') }}"></script>
  <script src="{{ @asset('/assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ @asset('assets/js/page/index.js') }}"></script>

<script>
    var qty = $('.qty').val();
    $(document).ready(function(){
        $('.produk').hide();
        $('#transaksi').change(function(){
            var id = $(this).val();
            $.ajax({
                url : "{{ url('/') }}"+"/produk/"+id,
                type : "GET",
                dataType : "JSON",
                success : function(data){
                    $('#nama_produk').html(data.data.nama_produk);
                    $('#nama_toko').html(data.data.nama_toko);
                    $('#harga_produk').attr('data-value', parseInt(data.data.harga));
                    if(qty !== null ){
                        var harga = $('#harga_produk').data('value');
                        var total = qty * harga;
                        $('#total').html(formatDesimal(total));
                    }else{
                        $('#total').html(formatDesimal(data.data.harga));
                    }
                    $('#harga_produk').html(formatDesimal(data.data.harga));
                    $('.produk').show();
                }
            });
        });
    });

    $('.qty').on('input', function(){
        var qty = $(this).val();
        var harga = $('#harga_produk').data('value');
        var total = qty * harga;
        $('#total').html(formatDesimal(total));
    });

    function formatDesimal(i)
    {
        var uang = new Intl.NumberFormat('ja-JP',
        {style: 'currency', currency: 'IDR'}).format(parseInt(i).toFixed(0));

        var convert = uang.replace('IDR', 'Rp');
        return convert;
    }
</script>
  @yield('script')
</body>
</html>
