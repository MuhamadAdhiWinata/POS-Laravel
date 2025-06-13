<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('operator')->attempt($credentials)) {
            $request->session()->regenerate();

            // Update kolom last_log (format tanggal saja)
            $operator = Auth::guard('operator')->user();
            $operator->last_log = now()->toDateString(); // simpan sebagai Y-m-d
            $operator->save();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }


    public function logout(Request $request)
    {
        Auth::guard('operator')->logout(); // Logout dari guard operator

        $request->session()->invalidate(); // Hapus semua sesi
        $request->session()->regenerateToken(); // Regenerasi token CSRF

        return redirect()->route('login')->with('status', 'Berhasil logout');
    }
}

?>
