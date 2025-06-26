<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Transaksi::with('details.barang', 'operator')->get()->map(function ($trx) {
            return [
                'tanggal' => $trx->tanggal_transaksi,
                'operator' => $trx->operator->nama_lengkap ?? '',
                'jumlah_item' => $trx->details->sum('qty'),
                'total_harga' => $trx->details->sum(fn($d) => $d->qty * $d->harga)
            ];
        });
    }

    public function headings(): array
    {
        return ['Tanggal', 'Operator', 'Jumlah Item', 'Total Harga'];
    }
}
