<?php

namespace App\Http\Controllers;
use App\Models\User;

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
        return view('main');
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
