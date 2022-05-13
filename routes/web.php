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

Auth::routes();

// CUstom Auth
Route::post('/logins', [App\Http\Controllers\AuthController::class, 'store'])->name('logins');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sales', [App\Http\Controllers\HomeController::class, 'sales'])->name('sales');
Route::post('/sales', [App\Http\Controllers\HomeController::class, 'salesCreate'])->name('sales.store');
Route::resource('/produk', App\Http\Controllers\ProdukController::class);
Route::resource('/toko', App\Http\Controllers\TokoController::class);
Route::resource('/laporan', App\Http\Controllers\LaporanController::class);
Route::resource('/transaksi', App\Http\Controllers\TransaksiController::class);
Route::resource('/kategori', App\Http\Controllers\CategoriController::class);


Route::get('spliter/{text}/{code}', function ($text, $code) {
    $data = explode($code, $text);
    return $data;
});


Route::get('test-kecocokan', function () {
    // DATA TBL OOB
    $data1 = [
        "ID",
        "ALAMAT_LOKASI_USAHA_SAAT_INI",
        "ALAMAT_PEMILIK_USAHA",
        "CIF_NUMBER",
        "CREATE_DATE",
        "DOB",
        "EMAIL_PEMILIK_USAHA",
        "ID_KELURAHAN",
        "ID_STATUS_PROSES",
        "JENIS_LOKASI_USAHA",
        "JENIS_USAHA",
        "KATEGORI_LOKASI_USAHA",
        "NAMA_IBU_KANDUNG",
        "NAMA_PEMILIK_USAHA",
        "NAMA_USAHA",
        "NO_HANDPHONE",
        "NO_NPWP",
        "NOMOR_KTP",
        "NOMOR_REKENING",
        "NOMOR_TELP",
        "OMZET",
        "PATH_FOTO_BARANG_ATAU_JASA",
        "PATH_FOTO_PEMILIK_TEMPAT_USAHA",
        "PATH_FOTO_TEMPAT_USAHA",
        "PATH_KTP",
        "PATH_NPWP",
        "PATH_WAJAH_KTP",
        "KODE_POS_ALAMAT_PEMILIK_USAHA",
        "NO_REFERRAL"
    ];

    // EXCEL 2
    $data2 = [
        "NAMA_PEMILIK_USAHA",
        "NOMOR_KTP",
        "NOMOR_REKENING",
        "NO_NPWP",
        "CIF_NUMBER",
        "ALAMAT",
        "KODE_POS_ALAMAT_PEMILIK_USAHA",
        "CITY",
        "OMSET",
        "NO_HANDPHONE",
        "NAMA_USAHA",
        "ALAMAT_USAHA",
        "CREATE_DATE",
        "JENIS_LOKASI_USAHA",
        "JENIS_USAHA",
        "LOKASI_USAHA",
        "KATEGORI_LOKASI_USAHA"
    ];


    $hasil = [];
    $cocok = [];
    $length= 0;

    foreach ($data1 as $key => $value) {
        if (!in_array($value, $data2)) {
            $cocok[] = $value;
        }
        if (in_array($value, $data2)) {
            $hasil[] = $value;
            $length++;
        }
    }

    $database = [];
    foreach($data2 as $key => $value) {
        if(!in_array($value, $cocok)) {
            $database[] = $value;
        }
    }

    $database2 = [];
    foreach($data1 as $key => $value) {
        if(!in_array($value, $data2)) {
            $database2[] = $value;
        }
    }

    if($length == count($data2)){
        $kecocokan = "Sama";
    }else{
        $kecocokan = "Kurang ".(count($data1) - $length);
    }
    return response()->json([
        // 'NotField' => $cocok,
        // 'inField' => $hasil,
        'status' => $kecocokan,
        'total_field' => [
            'database' => count($data1),
            'excel' => count($data2),
            'isi_data_cocok' => $database,
            'isi_data_tidak_cocok' => $database2
        ],
        'Presentase' => [
            'cocok' => ceil(count($hasil) / count($data1) * 100).'%',
            'tidak_cocok' => intval(count($cocok) / count($data1) * 100).'%'
        ]
    ]);

});
