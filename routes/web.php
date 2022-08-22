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
    return view('login');
});

// Auth::routes();

// CUstom Auth
Route::post('/logins', [App\Http\Controllers\AuthController::class, 'store'])->name('logins');

Route::get('logouts', function() {
    Auth::logout();
    return redirect('/');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sales', [App\Http\Controllers\HomeController::class, 'sales'])->name('sales');
Route::post('/sales', [App\Http\Controllers\HomeController::class, 'salesCreate'])->name('sales.store');
Route::get('/admins/{username}/{password}', [App\Http\Controllers\HomeController::class, 'createAdmin'])->name('admin.store');
Route::resource('/produk', App\Http\Controllers\ProdukController::class);
Route::get('/produk/ubah/{id}', [App\Http\Controllers\HomeController::class, 'ubahProduk'])->name('ubahProduk');
Route::get('/produk/hapus/{id}', [App\Http\Controllers\HomeController::class, 'deleteProduk'])->name('deleteProduk');
Route::post('/produk/ubah/{id}/post', [App\Http\Controllers\HomeController::class, 'postUbahProduk'])->name('postUbahProduk');
Route::resource('/toko', App\Http\Controllers\TokoController::class);
Route::resource('/laporan', App\Http\Controllers\LaporanController::class);
Route::resource('/transaksi', App\Http\Controllers\TransaksiController::class);
Route::resource('/kategori', App\Http\Controllers\CategoriController::class);
Route::get('/kategori/ubah/{id}', [App\Http\Controllers\HomeController::class, 'ubahKategori'])->name('ubahKategori');
Route::post('/kategori/ubah/{id}/post', [App\Http\Controllers\HomeController::class, 'postUbahKategori'])->name('postUbahKategori');
Route::get('/kategori/hapus/{id}', [App\Http\Controllers\HomeController::class, 'hapusKategori'])->name('hapusKategori');
Route::get('/sales/ubah/{id}', [App\Http\Controllers\HomeController::class, 'ubahSales'])->name('ubahSales');
Route::post('/sales/ubah/{id}/post', [App\Http\Controllers\HomeController::class, 'postUbahSales'])->name('postUbahSales');
Route::get('/sales/hapus/{id}', [App\Http\Controllers\HomeController::class, 'deleteSales'])->name('deleteSales');
Route::get('/toko/ubah/{id}', [App\Http\Controllers\HomeController::class, 'ubahToko'])->name('ubahToko');
Route::post('/toko/ubah/{id}/post', [App\Http\Controllers\HomeController::class, 'postUbahToko'])->name('postUbahToko');
Route::get('/toko/hapus/{id}/post', [App\Http\Controllers\HomeController::class, 'deleteToko'])->name('deleteToko');
