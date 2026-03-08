<?php 

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Petani; 
use App\Models\Bibit; 
use App\Models\Transaksi;
use App\Models\Lahan;

class PetaniController extends Controller
{
    /**
     * Menampilkan Dashboard dengan Notifikasi Bibit Terbaru dan Jatah Bibit
     */
    public function dashboard()
    {
        $bibitTerbaru = Bibit::latest()->first();
        $petani = Petani::where('user_id', Auth::id())->first();

        if (!$petani) {
            return redirect()->route('login');
        }

        // Ambil semua lahan milik petani ini untuk menghitung total jatah
        $lahans = Lahan::where('petani_id', $petani->id)->get();
        $totalLuas = $lahans->sum('luas_lahan');

        // Hitung Jatah Bibit (Berdasarkan akumulasi semua lahan)
        $jatahBibit = 0;
        if ($petani->status == 'disetujui') {
            $jatahDasar = ($totalLuas / 100) * 10;
            $jatahBibit = $jatahDasar + ($petani->jatah_tambahan ?? 0);
        }

        // AMBIL DATA RIWAYAT ASLI
        $riwayat = Transaksi::where('petani_id', $petani->id)
                    ->latest()
                    ->take(3)
                    ->get();

        return view('petani.dashboard', compact('bibitTerbaru', 'petani', 'jatahBibit', 'riwayat', 'totalLuas'));
    }

    /**
     * Menampilkan halaman khusus pengelolaan banyak lahan (Revisi)
     */
    public function lahan()
    {
        $petani = Petani::where('user_id', Auth::id())->first();
        
        $lahans = Lahan::where('petani_id', $petani->id)->get();
        $totalLuas = $lahans->sum('luas_lahan');
        $jumlahLahan = $lahans->count();

        return view('petani.lahan', compact('petani', 'lahans', 'totalLuas', 'jumlahLahan'));
    }

    /**
     * Menyimpan data lahan baru
     */
    public function storeLahan(Request $request)
    {
        $request->validate([
            'nama_blok' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric|min:1',
            'rencana_bibit' => 'required|string',
        ]);

        $petani = Petani::where('user_id', Auth::id())->first();

        Lahan::create([
            'petani_id' => $petani->id,
            'nama_blok' => $request->nama_blok,
            'luas_lahan' => $request->luas_lahan,
            'rencana_bibit' => $request->rencana_bibit,
            'jenis_tanah' => $request->jenis_tanah ?? '-',
        ]);

        return back()->with('success', 'Lahan baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan halaman Informasi & Pembelian Bibit
     */
    public function beliBibit()
    {
        $petani = Petani::where('user_id', Auth::id())->first();
        $semuaBibit = Bibit::all(); 
        
        // PERBAIKAN: Tambahkan pengambilan data lahan agar tidak error di Blade
        $lahans = Lahan::where('petani_id', $petani->id)->get();
        
        return view('petani.beli_bibit', compact('semuaBibit', 'petani', 'lahans'));
    }

    /**
     * Menampilkan halaman Riwayat Pembelian (Fungsi Baru)
     */
    public function riwayat()
    {
        $petani = Petani::where('user_id', Auth::id())->first();
        
        // Ambil riwayat dengan relasi lahan dan bibit
        $riwayat = Transaksi::with(['lahan', 'bibit'])
                    ->where('petani_id', $petani->id)
                    ->latest()
                    ->get();

        return view('petani.riwayat', compact('riwayat'));
    }

    /**
     * Menampilkan profil petani
     */
    public function index()
    {
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
            'foto_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_kk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $petani = Petani::where('user_id', Auth::id())->first();

        if ($request->hasFile('foto_ktp')) {
            $fileKtp = $request->file('foto_ktp');
            $namaKtp = 'KTP_' . time() . '.' . $fileKtp->getClientOriginalExtension();
            $fileKtp->move(public_path('uploads/identitas'), $namaKtp);
            $petani->foto_ktp = $namaKtp;
        }

        if ($request->hasFile('foto_kk')) {
            $fileKk = $request->file('foto_kk');
            $namaKk = 'KK_' . time() . '.' . $fileKk->getClientOriginalExtension();
            $fileKk->move(public_path('uploads/identitas'), $namaKk);
            $petani->foto_kk = $namaKk;
        }

        $petani->nik = $request->nik;
        $petani->nama_lengkap = $request->nama_lengkap;
        $petani->alamat = $request->alamat;
        $petani->status = 'pending'; 

        $petani->save();

        return redirect()->route('petani.profil')->with('success', 'Profil diperbarui!');
    }
}