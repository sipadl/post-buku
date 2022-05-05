<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sales', [App\Http\Controllers\HomeController::class, 'sales'])->name('sales');
Route::resource('/produk', App\Http\Controllers\ProdukController::class);
Route::resource('/toko', App\Http\Controllers\TokoController::class);
Route::resource('/laporan', App\Http\Controllers\LaporanController::class);
Route::resource('/transaksi', App\Http\Controllers\TransaksiController::class);
