<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Petani; // Wajib panggil model Petani
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // Untuk keamanan transaksi database

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        // Sekarang username dicek ke tabel users, no_hp dicek ke tabel petanis
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
            'no_hp'    => 'required|numeric|unique:petanis,no_hp',
        ]);

        // 2. Gunakan DB Transaction agar data masuk ke 2 tabel sekaligus dengan aman
        DB::beginTransaction();

        try {
            // A. Simpan data login ke tabel USERS
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role'     => 'petani', // Default role
            ]);

            // B. Simpan data profil ke tabel PETANIS
            Petani::create([
                'user_id'      => $user->id, // Menghubungkan ke ID User di atas
                'no_hp'        => $request->no_hp,
                'nama_lengkap' => $request->username, // Sementara disamakan dengan username
                'nik'          => '-', 
                'alamat'       => '-',
                'luas_lahan'   => 0,
                'status'       => 'pending',
                'foto_ktp'     => '', 
                'foto_kk'      => '',
            ]);

            DB::commit(); // Jika semua lancar, simpan ke database
            return redirect()->route('login')->with('success', 'Pendaftaran Berhasil! Silakan Masuk.');

        } catch (\Exception $e) {
            DB::rollback(); // Jika ada salah satu yang gagal, batalkan semuanya agar tidak error
            return back()->with('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        }
    }
}