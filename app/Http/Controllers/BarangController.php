<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::getAllWithKategori();
        return view('barang.index', compact('data'));
    }

    public function form()
    {
        $kategori = Kategori::all();
        return view('barang.form_input', compact('kategori'));
    }

    public function post(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kategori_id' => 'required|exists:kategori_barang,kategori_id',
        ]);

        Barang::createBarang($validated);

        return redirect()->route('barang.index');
    }

    public function edit($id)
    {
        $barang = Barang::findById($id);
        $kategori = Kategori::all();

        if (!$barang) {
            return redirect()->route('barang.index');
        }

        return view('barang.form_edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori_id' => 'required|exists:kategori_barang,kategori_id',
            'harga' => 'required|numeric'
        ]);

        Barang::updateById($id, $request->only(['kategori_id', 'nama_barang', 'harga']));

        return redirect()->route('barang.index');
    }

    public function delete($id)
    {
        $barang = Barang::findById($id);
        if (!$barang) {
            return redirect()->route('barang.index');
        }

        Barang::deleteById($id);

        return redirect()->route('barang.index');
    }
}
