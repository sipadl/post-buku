<?php

namespace App\Http\Controllers;
use App\Models\User;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $topProduk = DB::select("select * from produks p
        left join (select id,id_produk,jumlah, sum(id) as laku from transaksis t group by t.id_produk ) t on t.id_produk = p.id
        where p.id_toko = ? limit 1
        ", [$user->id ?? 1]);
        $topProduk = DB::select("select * from produks p
        left join (select id,id_produk,jumlah, sum(id) as laku from transaksis t group by t.id_produk ) t on t.id_produk = p.id
        where p.id_toko = ? limit 5", [$user->id ?? 1]);

        $listTransaksi = Transaksi::where('id_cashier', $user->id ?? 1)->paginate(10);
        return view('main', compact('topProduk', 'listTransaksi'));
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
        $data = User::create($request->except('_token'));
        if ($data) {
            return redirect()->back()->with('success', 'Sales berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Sales gagal ditambahkan');
        }
    }
}
