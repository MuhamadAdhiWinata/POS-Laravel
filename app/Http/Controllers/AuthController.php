<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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

            $operator = Auth::guard('operator')->user();
            $operator->last_log = now()->toDateString();
            $operator->save();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }


    public function logout(Request $request)
    {
        Auth::guard('operator')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Berhasil logout');
    }
}

?>
