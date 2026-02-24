<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bibit;
use Illuminate\Support\Facades\File;

class BibitController extends Controller
{
    public function index() {
        $bibits = Bibit::all(); 
        return view('layouts.admin.data_bibit', compact('bibits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bibit' => 'required',
            'stok' => 'required|numeric',
            'harga_subsidi' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama_bibit', 'jenis', 'stok', 'harga_subsidi', 'deskripsi']);
        
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = 'bibit_' . time() . '.' . $file->getClientOriginalExtension();
            
            // Tentukan path folder
            $tujuanPath = public_path('uploads/bibit');

            // Cek apakah folder sudah ada, kalau belum, buat otomatis
            if (!File::isDirectory($tujuanPath)) {
                File::makeDirectory($tujuanPath, 0777, true, true);
            }
            
            // Pindahkan file
            $file->move($tujuanPath, $namaFile);
            
            $data['gambar'] = $namaFile;
        }

        $data['status'] = $request->stok > 0 ? 'tersedia' : 'habis';

        Bibit::create($data);

        /**
         * PERBAIKAN DI SINI:
         * Kita gunakan redirect ke route index agar session 'notif_petani' 
         * tersimpan di sistem dan bisa muncul saat kamu buka dashboard petani.
         */
        return redirect()->route('admin.data_bibit')
            ->with('success', 'Data bibit berhasil ditambahkan!')
            ->with('notif_petani', 'Kabar gembira! Bibit ' . $request->nama_bibit . ' terbaru sudah tersedia. Cek sekarang!');
    }

    public function destroy($id)
    {
        $bibit = Bibit::find($id);
        
        if ($bibit) {
            if ($bibit->gambar) {
                $path = public_path('uploads/bibit/' . $bibit->gambar);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
            
            $bibit->delete();
            return back()->with('success', 'Data bibit berhasil dihapus!');
        }

        return back()->with('error', 'Data tidak ditemukan.');
    }
}