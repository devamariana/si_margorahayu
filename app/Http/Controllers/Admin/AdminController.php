<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; 
use App\Models\Petani; // Wajib panggil model Petani
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Tambahkan untuk proses hapus yang aman

class AdminController extends Controller
{
    /**
     * Menampilkan daftar semua petani untuk Admin
     */
    public function dataPetani()
    {
        // PERBAIKAN: Ambil data dari model Petani, lalu tarik data User-nya (username)
        // Kita urutkan berdasarkan status 'pending' agar muncul di atas
        $petanis = Petani::with('user')
                        ->orderByRaw("FIELD(status, 'pending', 'disetujui', 'ditolak')")
                        ->get();

        return view('layouts.admin.data_petani', compact('petanis'));
    }

    /**
     * Memproses verifikasi status petani (Disetujui/Ditolak)
     */
    public function verifikasiPetani(Request $request, $id)
    {
        // PERBAIKAN: Cari di model Petani menggunakan ID profilnya
        $petani = Petani::find($id);

        if (!$petani) {
            return back()->with('error', 'Data petani tidak ditemukan.');
        }

        // Update status di tabel petanis
        $petani->status = $request->status;
        $petani->save();

        return back()->with('success', 'Status petani ' . $petani->nama_lengkap . ' berhasil diperbarui menjadi ' . $petani->status);
    }

    /**
     * Menghapus Petani (Menghapus di 2 tabel sekaligus)
     */
    public function hapusPetani($id)
    {
        // PERBAIKAN: Gunakan transaksi agar data di tabel users dan petanis terhapus semua
        DB::beginTransaction();
        try {
            $petani = Petani::find($id);
            
            if ($petani) {
                // Hapus akun di tabel users
                User::where('id', $petani->user_id)->delete();
                // Hapus profil di tabel petanis
                $petani->delete();

                DB::commit();
                return back()->with('success', 'Data petani dan akun berhasil dihapus!');
            }

            return back()->with('error', 'Data tidak ditemukan.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Gagal menghapus data.');
        }
    }
}