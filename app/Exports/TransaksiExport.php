<?php
namespace App\Exports;

use App\Models\Transaksi;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

// class TransaksiExport implements FromView
// {
//     use Exportable;

//     public function __construct(int $month)
//     {
//         $this->month = $month;
//     }

//     public function view() : View
//     {
//         return view('vendor.laporan', [
//             'transaksi' => Transaksi::whereMonth('created_at', $this->month)->get(),
//         ]);
//         // return Transaksi::query()->whereMonth('created_at', $this->month);
//     }
// }

class TransaksiExport implements FromCollection
{
    public function collection()
    {
        return Transaksi::all();
    }
}
