<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Petani\PetaniController;
use App\Http\Controllers\Admin\BibitController;
use App\Http\Controllers\Petani\TransaksiController; 

// --- HALAMAN PUBLIK (Bisa diakses tanpa login) ---
Route::get('/', function () {
    return view('welcome');
});

// Guest Middleware: Kalau sudah login, tidak bisa buka halaman login/register lagi
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']); 
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// --- HALAMAN TERPROTEKSI (Wajib Login) ---
Route::middleware(['auth'])->group(function () {

    // 1. KHUSUS ROLE: ADMIN
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        // Kelola Data Petani
        Route::get('/admin/data-petani', [AdminController::class, 'dataPetani'])->name('admin.data_petani');
        Route::post('/admin/verifikasi-petani/{id}', [AdminController::class, 'verifikasiPetani'])->name('admin.verifikasi_petani');
        Route::delete('/admin/petani/hapus/{id}', [AdminController::class, 'hapusPetani'])->name('admin.hapus_petani');
        Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('petani.transaksi.store');

        // Kelola Data Bibit
        Route::get('/admin/data-bibit', [BibitController::class, 'index'])->name('admin.data_bibit');
        Route::post('/admin/data-bibit/store', [BibitController::class, 'store'])->name('admin.store_bibit');
        Route::delete('/admin/data-bibit/destroy/{id}', [BibitController::class, 'destroy'])->name('admin.data_bibit.destroy');

        // Pindah Jatah (Admin)
        Route::get('/admin/pindah-jatah', [AdminController::class, 'pindahJatah'])->name('admin.pindah_jatah');
        Route::post('/admin/pindah-jatah/proses', [AdminController::class, 'prosesPindahJatah'])->name('admin.proses_pindah');

        // Menu Admin Lainnya
        Route::get('/admin/data-periode', function () { return view('layouts.admin.data_periode'); })->name('admin.data_periode');
        Route::get('/admin/data-lahan', function () { return view('layouts.admin.data_lahan'); })->name('admin.data_lahan');
        Route::get('/admin/riwayat-transaksi', function () { return view('layouts.admin.riwayat_transaksi'); })->name('admin.riwayat_transaksi');
    });

    // 2. KHUSUS ROLE: PETANI
    Route::middleware(['checkRole:petani'])->group(function () {
        Route::get('/dashboard-petani', [PetaniController::class, 'dashboard'])->name('petani.dashboard');
        
        // Profil Petani
        Route::get('/profil-petani', [PetaniController::class, 'index'])->name('petani.profil');
        Route::post('/profil-petani/update', [PetaniController::class, 'updateProfil'])->name('petani.update');

        // REVISI: Kelola Lahan Petani (Banyak Lahan)
        Route::get('/petani/lahan', [PetaniController::class, 'lahan'])->name('petani.lahan');
        Route::post('/petani/lahan/store', [PetaniController::class, 'storeLahan'])->name('petani.store_lahan');

        // Informasi & Beli Bibit
        Route::get('/beli-bibit', [PetaniController::class, 'beliBibit'])->name('petani.beli_bibit');
        Route::get('/riwayat-pembelian', function () { return view('petani.riwayat'); })->name('petani.riwayat');
    });
});