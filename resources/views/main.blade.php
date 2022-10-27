@extends('layouts.index')
@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title">Order Statistics this month</div>
          <div class="card-stats-items justify-content-between">
            <div class="card-stats-item">
              <div class="card-stats-item-count">{{ $cancel }}</div>
              <div class="card-stats-item-label">Gagal</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">{{ $sum }}</div>
              <div class="card-stats-item-label">Berhasil</div>
            </div>
          </div>
        </div>
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-archive"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Penjualan</h4>
          </div>
          <div class="card-body">
              {{ $sum + $cancel }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Presentase Penjualan</div>
            <div class="card-stats-items justify-content-between">
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{ round($presentaseMin, 2) .'%' }}</div>
                <div class="card-stats-item-label">Gagal</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{ round($presentaseMax, 2) .'%' }}</div>
                <div class="card-stats-item-label">Berhasil</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pendapatan</h4>
            </div>
            <div class="card-body">
                Rp. {{ number_format($pendapatan,0,',','.') }}
            </div>
          </div>
        </div>
      </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Sales</h4>
          </div>
          <div class="card-body">
            {{$sales}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card gradient-bottom">
        <div class="card-header">
          <h4>Produk Terlaris pada bulan ini sebanyak : {{ $sum }}</h4>
        </div>
        <div class="card-body" id="top-5-scroll">
          <ul class="list-unstyled list-unstyled-border">
            <canvas id="barChart" width="400" height="400"></canvas>

            {{-- @foreach($topProduk as $produk)
            <li class="media">
              <img class="mr-3 rounded" width="55" src="../assets/img/products/product-3-50.png" alt="product">
              <div class="media-body">
                <div class="float-right"><div class="font-weight-600 text-muted text-small">Rp {{ number_format($produk->harga,0,'.',',') }}</div></div>
                <div class="media-title">{{$produk->nama_produk}} </div>
                <div class="mt-1">
                  <div class="budget-price">
                    <div class="budget-price-square bg-primary" data-width="64%"></div>
                    <div class="budget-price-label">{{ $produk->stok }}</div>
                  </div>
                  <div class="budget-price">
                    <div class="budget-price-square bg-danger" data-width="43%"></div>
                    <div class="budget-price-label">{{ $produk->laku }}</div>
                  </div>
                </div>
              </div>
            </li>
            @endforeach --}}
          </ul>
        </div>
        <div class="card-footer pt-3 d-flex justify-content-center">
          <div class="budget-price justify-content-center">
            <div class="budget-price-square bg-primary" data-width="20"></div>
            <div class="budget-price-label">Stok Produk</div>
          </div>
          <div class="budget-price justify-content-center">
            <div class="budget-price-square bg-danger" data-width="20"></div>
            <div class="budget-price-label">Produk Terjual</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Transaksi Bulan Ini</h4>
          <div class="card-header-action">
            <a href="/transaksi" class="btn btn-danger">Lihat Lainnya <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive table-invoice">
            <table class="table table-striped">
              <tr>
                <th>Invoice ID</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Due Date</th>
                {{-- <th>Action</th> --}}
              </tr>
                @if(count($todayTrans) > 0)
                    @foreach($todayTrans as $trans)
                    <tr>
                        <td><a href="#">{{ 'HRVST-M-D-'.$trans->kode_transaksi ?? '' }}</a></td>
                        <td class="font-weight-600">{{ $trans->nama_pembeli }}</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>{{ $trans->created_at }}</td>
                        {{-- <td>
                        <a href="#" class="btn btn-primary">Pembayaran Berhasil</a>
                        <a href="#" class="btn btn-primary">Pembayaran Gagal</a>
                        </td> --}}
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada transaksi hari ini</td>
                    </tr>
                @endif
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('barChart');
const barChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Top 1','Top 2', 'Top 3', 'Top 4', 'Top 5'],
        datasets: [{
            label: 'Paling Terlari No 1 ',
            data: [{{(int)$topProduk[0]->laku}}, {{(int)$topProduk[1]->laku}}, {{(int)$topProduk[2]->laku}}, {{(int)$topProduk[3]->laku}}, {{(int)$topProduk[4]->laku}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: false
            }
        }
    }
});
</script>
  @endsection
