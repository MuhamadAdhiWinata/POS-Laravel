<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Transaksi::with(['operator', 'details.barang'])
            ->get()
            ->map(function ($transaksi) {
                $rows = [];

                foreach ($transaksi->details as $detail) {
                    $rows[] = [
                        'tanggal'     => $transaksi->tanggal_transaksi,
                        'operator'    => $transaksi->operator->nama_lengkap ?? '-',
                        'barang'      => $detail->barang->nama_barang ?? '-',
                        'qty'         => $detail->qty,
                        'harga'       => $detail->harga,
                        'subtotal'    => $detail->qty * $detail->harga,
                    ];
                }

                return $rows;
            })
            ->flatten(1);
    }

    public function headings(): array
    {
        return [
            'Tanggal Transaksi',
            'Nama Operator',
            'Nama Barang',
            'Qty',
            'Harga',
            'Subtotal',
        ];
    }
}
