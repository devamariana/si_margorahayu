<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('auth.login');
    }

    // Memproses masuk ke sistem
    public function authenticate(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // 2. Coba login (menggunakan username dan password)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // --- PERBAIKAN DI SINI: LOGIKA PENGALIHAN BERDASARKAN ROLE ---
            $user = Auth::user(); // Ambil data user yang sedang login

            if ($user->role === 'admin') {
                // Jika dia Ketua/Admin, lempar ke dashboard admin
                return redirect()->route('admin.dashboard');
            } 
            
            // Jika dia Petani (default), lempar ke dashboard petani
            return redirect()->route('petani.dashboard');
            // -----------------------------------------------------------
        }

        // Jika gagal, kembalikan dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    // Fungsi Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}