<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Str;
use DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::paginate(20);
        return view('admin.sales.transaksi', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
        $produk = Produk::where('id', $request->id_produk)->first();
        $user = Auth::user();

        $data = [
            'nama_produk' => $produk->nama_produk,
            'nama_pembeli' => $request->nama_pembeli,
            'kode_transaksi' => strtoupper(Str::random(3).mt_rand(1000000, 9999999)),
            'id_toko' => $produk->id_toko,
            'id_produk' => $produk->id,
            'id_cashier' => $user->id ?? 0,
            'jumlah' => $request->jumlah,
            'harga' => (int)$produk->harga,
            'total' => $request->jumlah * $produk->harga,
            'created_at' => Carbon::now(),
        ];
        $transaksi = Transaksi::create($data);
            return redirect()->back()->withInput()->with(['success' => 'Transaksi berhasil ditambahkan']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
