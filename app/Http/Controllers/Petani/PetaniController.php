<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Petani; // WAJIB: Panggil model Petani
use App\Models\Bibit; 

class PetaniController extends Controller
{
    /**
     * Menampilkan Dashboard dengan Notifikasi Bibit Terbaru
     */
    public function dashboard()
    {
        $bibitTerbaru = Bibit::latest()->first();
        
        // Ambil data profil dari tabel petanis berdasarkan user login
        $petani = Petani::where('user_id', Auth::id())->first();

        return view('petani.dashboard', compact('bibitTerbaru', 'petani'));
    }

    /**
     * Menampilkan profil petani
     */
    public function index()
    {
        // Ambil profil dari tabel petanis, bukan dari Auth::user() langsung
        $petani = Petani::where('user_id', Auth::id())->first();
        
        return view('petani.profil', compact('petani'));
    }

    /**
     * Memproses update profil
     */
    public function updateProfil(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric',
            'foto_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_kk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // CARI DATA DI MODEL PETANI, BUKAN USER
        $petani = Petani::where('user_id', Auth::id())->first();

        if (!$petani) {
            return back()->with('error', 'Data profil tidak ditemukan.');
        }

        // Proses Upload Foto KTP
        if ($request->hasFile('foto_ktp')) {
            $fileKtp = $request->file('foto_ktp');
            $namaKtp = 'KTP_' . time() . '.' . $fileKtp->getClientOriginalExtension();
            $fileKtp->move(public_path('uploads/identitas'), $namaKtp);
            $petani->foto_ktp = $namaKtp;
        }

        // Proses Upload Foto KK
        if ($request->hasFile('foto_kk')) {
            $fileKk = $request->file('foto_kk');
            $namaKk = 'KK_' . time() . '.' . $fileKk->getClientOriginalExtension();
            $fileKk->move(public_path('uploads/identitas'), $namaKk);
            $petani->foto_kk = $namaKk;
        }

        // Update data ke tabel PETANIS
        $petani->nik = $request->nik;
        $petani->nama_lengkap = $request->nama_lengkap;
        $petani->luas_lahan = $request->luas_lahan;
        $petani->alamat = $request->alamat;
        $petani->status = 'pending'; // Reset status jadi pending

        $petani->save();

        return redirect()->route('petani.profil')->with('success', 'Profil diperbarui! Tunggu verifikasi admin.');
    }
}