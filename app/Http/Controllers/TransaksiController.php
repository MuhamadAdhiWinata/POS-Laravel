<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function create()
    {
        $barang = Barang::all();
        $detail = TransaksiDetail::with('barang')
                    ->where('status', '0')
                    ->get();

        return view('Transaksi.form_transaksi', compact('barang', 'detail'));
    }

    // Simpan item transaksi sementara (status = 0)
    public function store(Request $request)
    {
        $request->validate([
            'barang' => 'required',
            'qty' => 'required|integer|min:1',
        ]);

        $barang = Barang::where('nama_barang', $request->barang)->first();
        if (!$barang) {
            return back()->with('error', 'Barang tidak ditemukan.');
        }

        TransaksiDetail::create([
            'barang_id' => $barang->barang_id,
            'qty' => $request->qty,
            'harga' => $barang->harga,
            'status' => '0',
        ]);

        return redirect()->route('transaksi.create')->with('success', 'Barang ditambahkan.');
    }

    public function destroy($id)
    {
        $detail = TransaksiDetail::findOrFail($id);
        $detail->delete();

        return redirect()->route('transaksi.create')->with('success', 'Item dihapus.');
    }

    public function selesaiBelanja()
    {
        $username = auth()->user()->username;
        $operator = Operator::where('username', $username)->first();

        if (!$operator) {
            return redirect()->route('transaksi.create')->with('error', 'Operator tidak ditemukan.');
        }

        $transaksi = Transaksi::create([
            'operator_id' => $operator->operator_id,
            'tanggal_transaksi' => now()->toDateString(), // atau date('Y-m-d')
        ]);

        TransaksiDetail::where('status', '0')->update([
            'transaksi_id' => $transaksi->transaksi_id,
            'status' => '1',
        ]);

        return redirect()->route('transaksi.create')->with('success', 'Transaksi berhasil diselesaikan.');
    }

    public function laporan()
    {
        $defaultData = $this->getLaporanData();
        return view('transaksi.laporan', [
            'record' => $defaultData['record'],
            'total' => $defaultData['total'],
            'tanggal1' => null,
            'tanggal2' => null
        ]);
    }

    public function laporanProses(Request $request)
    {
        $request->validate([
            'tanggal1' => 'required|date',
            'tanggal2' => 'required|date|after_or_equal:tanggal1'
        ]);

        $data = $this->getLaporanData($request->tanggal1, $request->tanggal2);

        return view('transaksi.laporan', [
            'record' => $data['record'],
            'total' => $data['total'],
            'tanggal1' => $request->tanggal1,
            'tanggal2' => $request->tanggal2
        ]);
    }

    private function getLaporanData($tanggal1 = null, $tanggal2 = null)
    {
        $query = Transaksi::select([
                'transaksi.transaksi_id',
                'transaksi.tanggal_transaksi',
                'operator.nama_lengkap',
                DB::raw('SUM(transaksi_detail.harga * transaksi_detail.qty) as total')
            ])
            ->join('transaksi_detail', 'transaksi_detail.transaksi_id', '=', 'transaksi.transaksi_id')
            ->join('operator', 'operator.operator_id', '=', 'transaksi.operator_id')
            ->groupBy('transaksi.transaksi_id', 'transaksi.tanggal_transaksi', 'operator.nama_lengkap');

        if ($tanggal1 && $tanggal2) {
            $query->whereBetween('transaksi.tanggal_transaksi', [$tanggal1, $tanggal2]);
        }

        $record = $query->get();
        $total = $record->sum('total');

        return [
            'record' => $record,
            'total' => $total
        ];
    }
}
