<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PetaniController extends Controller
{
    /**
     * Menampilkan halaman profil petani
     */
    public function index()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();
        return view('petani.profil', compact('user'));
    }

    /**
     * Memproses pembaruan profil dan upload foto
     */
    public function updateProfil(Request $request)
    {
        // Ambil instance model User berdasarkan ID yang sedang login
        $user = User::find(Auth::id());

        // Validasi jika user tidak ditemukan (sesi habis)
        if (!$user) {
            return redirect()->route('login')->with('error', 'Sesi berakhir, silakan login kembali.');
        }

        // 1. Logika Upload Foto KTP
        if ($request->hasFile('foto_ktp')) {
            $fileKtp = $request->file('foto_ktp');
            $namaKtp = 'KTP_' . time() . '.' . $fileKtp->getClientOriginalExtension();
            $fileKtp->move(public_path('uploads/identitas'), $namaKtp);
            
            // Simpan nama file ke objek user
            $user->foto_ktp = $namaKtp;
        }

        // 2. Logika Upload Foto KK
        if ($request->hasFile('foto_kk')) {
            $fileKk = $request->file('foto_kk');
            $namaKk = 'KK_' . time() . '.' . $fileKk->getClientOriginalExtension();
            $fileKk->move(public_path('uploads/identitas'), $namaKk);
            
            // Simpan nama file ke objek user
            $user->foto_kk = $namaKk;
        }

        // 3. Update data teks
        $user->nik = $request->nik;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->luas_lahan = $request->luas_lahan;
        $user->alamat = $request->alamat;

        // 4. Update Status Verifikasi
        // Setiap kali data diubah/disimpan, status diset ke 'pending' agar Admin tahu ada data baru
        $user->status = 'pending';

        // Simpan semua perubahan ke database SQLyog
        $user->save();

        // Menggunakan redirect ke route agar halaman refresh dengan benar dan tetap di profil
        return redirect()->route('petani.profil')->with('success', 'Data berhasil dikirim! Silakan tunggu verifikasi dari Admin.');
    }
}