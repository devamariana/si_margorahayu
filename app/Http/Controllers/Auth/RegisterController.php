<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Menampilkan halaman pendaftaran sesuai desain Anda
    public function index()
    {
        return view('auth.register');
    }

    // Memproses data dari form pendaftaran
    public function store(Request $request)
    {
        // PERBAIKAN: Ubah 'unique:users' menjadi 'unique:petanis' agar sinkron dengan tabel di SQLyog
        $request->validate([
            'no_hp'    => 'required|numeric|unique:petanis,no_hp',
            'username' => 'required|string|max:255|unique:petanis,username',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Menyimpan data ke database melalui Model User (yang sudah terhubung ke tabel petanis)
        User::create([
            'username' => $request->username,
            'no_hp'    => $request->no_hp,
            'password' => Hash::make($request->password), 
            'role'     => 'petani', // Tambahkan ini agar tidak error lagi
        ]);

        // Setelah sukses, diarahkan ke halaman login
        return redirect()->route('login')->with('success', 'Pendaftaran Berhasil! Silakan Masuk.');
    }
}