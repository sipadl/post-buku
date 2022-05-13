<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use DB;
use Hash;
use App\Models\Transaksi;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // $topProduk = [];
        if($user->role != 'admin'){
            $todayTrans = DB::select("select * from transaksis e
            left join (select id,id_produk,jumlah, sum(id) as laku from transaksis t group by t.id_produk ) t on t.id_produk = e.id_produk
            where id_toko = $user->id_toko and e.created_at like '%".date('Y-m-d')."%'
            ");
            $topProduk = DB::select("select p.*, t.id, jumlah, total, sum(jumlah) as laku from transaksis t
            left join ( select * from produks p) p on p.id = t.id_produk
            where p.id_toko = ?
            group by p.id limit 5
            ", [$user->id_toko ?? 1]);
            $listTransaksi = Transaksi::where('id_cashier', $user->id_toko ?? 1)->paginate(10);
        }else{
            $todayTrans = DB::select("select * from transaksis d
            left join (select id,id_produk,jumlah, sum(id) as laku from transaksis t group by t.id_produk ) t on t.id_produk = d.id_produk
            where d.created_at like '%".date('Y-m-d')."%'
            ");
            $topProduk = DB::select("select * from produks p
            left join (select id,id_produk,jumlah, sum(id) as laku from transaksis t group by t.id_produk ) t on t.id_produk = p.id
            limit 1
            ");
            $listTransaksi = Transaksi::paginate(10)->OrderBy('created_at', 'desc');
        }
        return view('main', compact('topProduk', 'listTransaksi', 'todayTrans'));
    }

    public function sales()
    {
        $data = User::where('roles','user')
        ->leftJoin('tokos', 'users.id_toko', '=', 'tokos.id')
        ->get();
        return view('admin.sales.index', compact('data'));
    }

    public function salesCreate(Request $request)
    {
        $inputan = $request->except('_token', 'password');
        $inputan['password'] = Hash::make($request->password);
        $data = User::create($inputan);
        if ($data) {
            return redirect()->back()->with('success', 'Sales berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Sales gagal ditambahkan');
        }
    }
}
