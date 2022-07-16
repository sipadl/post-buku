<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Categori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::join('categoris', 'produks.id_kategori', '=', 'categoris.id')->paginate(20);
        $categori = Categori::all();
        return view('admin.produk.index', compact('produk', 'categori'));
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
        $data = Produk::create($request->except('_token'));
        if ($data) {
            return redirect()->back()->with('success', 'Toko berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Toko gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toko = $id_toko ?? 1;
        $data = Produk::select('nama_produk','harga','nama_toko','stok')
        ->leftJoin('tokos', 'produks.id_toko', '=', 'tokos.id')
        ->where('produks.id', $id)
        ->first();
        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Produk::where('id', $id)->delete();
    }
}
