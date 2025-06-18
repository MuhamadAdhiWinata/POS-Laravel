<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::getAll();
        return view('kategori.index', compact('data'));
    }

    public function post(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        Kategori::createKategori($validated);

        return redirect()->route('kategori.index');
    }

    public function edit($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $kategori = Kategori::findById($id);

            if (!$kategori) {
                abort(404, 'Kategori tidak ditemukan.');
            }

            return view('kategori.form_edit', compact('kategori'));
        } catch (\Exception $e) {
            abort(404, 'ID tidak valid.');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        Kategori::updateById($id, $validated);

        return redirect()->route('kategori.index');
    }

    public function delete($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            Kategori::deleteById($id);

            return redirect()->route('kategori.index');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index');
        }
    }
}
