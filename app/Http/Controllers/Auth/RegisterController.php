<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
{
    // 1. Validasi Input
    $request->validate([
        'username' => 'required|string|max:255|unique:users,username',
        'email'    => 'required|email|max:255|unique:users,email', 
        'password' => 'required|string|min:8|confirmed',
    ]);

    DB::beginTransaction();

    try {
        // A. Simpan ke tabel USERS
        $user = User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'petani',
        ]);

        // B. Simpan ke tabel PETANIS
        // Sesuai SQLyog kamu, hilangkan 'jatah_tambahan' di sini
        Petani::create([
            'user_id'      => $user->id,
            'no_hp'        => '-', 
            'nama_lengkap' => $request->username,
            'nik'          => '-', 
            'alamat'       => '-',
            'luas_lahan'   => 0,
            'status'       => 'pending',
            'foto_ktp'     => '', 
            'foto_kk'      => '',
        ]);

        DB::commit(); 
        
        // Pindah ke Login jika sukses
        return redirect()->route('login')->with('success', 'Pendaftaran Berhasil!');

    } catch (\Exception $e) {
        DB::rollback();
        // Munculkan error di atas form jika gagal
        return back()->withErrors(['username' => 'Error: ' . $e->getMessage()]);
    }
}
}