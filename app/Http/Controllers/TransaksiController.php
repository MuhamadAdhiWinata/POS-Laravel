<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            'transaksi_id' => $transaksi->id,
            'status' => '1',
        ]);

        return redirect()->route('transaksi.create')->with('success', 'Transaksi berhasil diselesaikan.');
    }

    // Endpoint API JSON (opsional)
    public function index()
    {
        $data = Transaksi::with(['operator', 'detail.barang'])->get();
        return response()->json($data);
    }
}
