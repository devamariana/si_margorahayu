<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // 2. Proses Login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();

            // 3. Logika Pengalihan berdasarkan ROLE
            // Menggunakan intended() lebih aman agar user kembali ke halaman yang mereka tuju sebelumnya
            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            } 
            
            return redirect()->intended(route('petani.dashboard'));
        }

        // 4. Jika gagal, kembalikan dengan pesan error yang jelas
        return back()->withErrors([
            'loginError' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda telah berhasil keluar.');
    }
}