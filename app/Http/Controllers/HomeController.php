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
        // $topProduk = [];
        if($user->role != 'admin'){
            $todayTrans = DB::select("select * from transaksis e
            left join (select id,id_produk,jumlah, sum(id) as laku from transaksis t group by t.id_produk ) t on t.id_produk = e.id_produk
            where id_toko = $user->id_toko and date_format(e.created_at,'%m') = ".date('m')." limit 9");
            $topProduk = DB::select("select p.*, p.id, t.id_produk,t.id_toko, sum(jumlah) as laku from transaksis t
            left join ( select * from produks p) p
            on p.item_id = t.id_produk
            where date_format(t.created_at, '%m') = date_format(now(), '%m' )
            and t.id_toko = ?
            group by t.id_produk
            order by laku desc
            limit 5
            ", [$user->id_toko ?? 1]);
            $listTransaksi = Transaksi::where('id_cashier', $user->id_toko ?? 1)->paginate(10);
            $sales = $this->countSales($user->id_toko);
            $cancel = $this->sumCancelTransaksi($user->id_toko);
            $sum = $this->sumTransaksi($user->id_toko);
            $pendapatan = $this->pendpatan($user->id_toko);
        }else{
            $pendapatan = $this->pendpatan(null, true);
            $sales = $this->countSales(null , true);
            $cancel = $this->sumCancelTransaksi(null, true);
            $sum = $this->sumTransaksi(null, true);
            $todayTrans = DB::select("select * from transaksis d
            left join (select id,id_produk,jumlah, sum(id) as laku from transaksis t group by t.id_produk ) t on t.id_produk = d.id_produk
            where date_format(d.created_at,'%m') = ".date('m'))[0] ?? 0;
            $topProduk = DB::select("select * from produks p
            left join (select id,id_produk,jumlah, sum(id) as laku from transaksis t group by t.id_produk ) t on t.id_produk = p.id
            limit 1
            ");
            $listTransaksi = Transaksi::paginate(10)->OrderBy('created_at', 'desc');
        }
        return view('main', compact('topProduk', 'listTransaksi', 'todayTrans', 'sum', 'cancel', 'sales', 'pendapatan'));
    }


    private function countSales($id_toko, $admin = false){
        if(!$admin){
            return DB::table('users')->where('roles', 'user')->where('id_toko', $id_toko)->count();
        }else{
            return DB::table('users')->where('roles', 'user')->count();
        }
    }

    private function sumTransaksi($toko ,$admin = null)
    {
        if($admin) {
            return DB::select("select sum(id) as jumlah from transaksis where status = 1 and date_format(created_at, '%m') = ".date('m'))[0]->jumlah ?? 0;
        }else{
            return DB::select("select sum(id) as jumlah from transaksis where status = 1 and id_toko = $toko and date_format(created_at, '%m') = ".date('m'))[0]->jumlah ?? 0;
        }
    }

    private function sumCancelTransaksi($toko ,$admin = null)
    {
        if($admin) {
            return DB::select("select sum(id) as jumlah from transaksis where status = 0 and date_format(created_at, '%m') = ".date('m'))[0]->jumlah ?? 0;
        }else{
            return DB::select("select sum(id) as jumlah from transaksis where status = 0 and id_toko = $toko and date_format(created_at, '%m') = ".date('m'))[0]->jumlah ?? 0;
        }
    }

    private function pendpatan($toko ,$admin = null)
    {
        if($admin) {
            return DB::select("select sum(total) as jumlah from transaksis where status = 1 and date_format(created_at, '%m') = ".date('m'))[0]->jumlah ?? 0;
        }else{
            return DB::select("select sum(total) as jumlah from transaksis where status = 1 and id_toko = $toko and date_format(created_at, '%m') = ".date('m'))[0]->jumlah ?? 0;
        }
    }

    public function sales()
    {
        $data = User::where('roles','user')
        ->leftJoin('tokos', 'users.id_toko', '=', 'tokos.id')
        ->paginate(20);
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

    public function createAdmin($username, $password)
    {
        $toko = DB::table('tokos')->insertGetId([
            'nama_toko' => 'toko makmur',
            'alamat' => 'DKI Jakarta, Jakarta Timur Indonesia',
            'no_telp' => '081290669170',
            'email' => 'dev.padel.test@gmail.com',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $data = [
            'nama' => 'admin',
            'username' => $username,
            'password' => Hash::make($password),
            'no_ktp' => 0,
            'profile' => 1,
            'status' => 1,
            'roles' => 'admin',
            'id_toko' => $toko,
            'created_at' => date('Y-m-d H:i:s')
        ];
        DB::table('users')->insert($data);
    }
}
