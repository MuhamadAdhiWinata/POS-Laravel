<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class OperatorController extends Controller
{
    public function index()
    {
        $data = Operator::getAll();
        return view('operator.index', compact('data'));
    }

    public function create()
    {
        return view('operator.form_input');
    }

    public function post(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string',
            'username' => 'required|string|unique:operator',
            'password' => 'required|string|min:4',
        ]);

        $validated['password'] = bcrypt($validated['password']); // password hashed

        Operator::createOperator($validated);

        return redirect()->route('operator.index')->with('success', 'Operator berhasil ditambahkan.');
    }

    public function edit($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $operator = Operator::findById($id);

        if (!$operator) {
            return abort(404);
        }

        return view('operator.form_edit', compact('operator', 'encryptedId'));
    }

    public function update(Request $request, $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);

        $validated = $request->validate([
            'nama_lengkap' => 'required|string',
            'username' => 'required|string|unique:operator,username,' . $id . ',operator_id',
            'password' => 'nullable|string|min:4',
        ]);

        if ($validated['password']) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']); // biarkan password lama jika tidak diubah
        }

        Operator::updateById($id, $validated);

        return redirect()->route('operator.index')->with('success', 'Operator berhasil diperbarui.');
    }

    public function delete($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        Operator::deleteById($id);

        return redirect()->route('operator.index')->with('success', 'Operator berhasil dihapus.');
    }
}
