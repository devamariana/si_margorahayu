<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Petani\PetaniController;
use App\Http\Controllers\Admin\BibitController;

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
        Route::get('/admin/dashboard', function () {
            return view('layouts.admin.dashboard'); 
        })->name('admin.dashboard');

        // Kelola Data Petani
        Route::get('/admin/data-petani', [AdminController::class, 'dataPetani'])->name('admin.data_petani');
        Route::post('/admin/verifikasi-petani/{id}', [AdminController::class, 'verifikasiPetani'])->name('admin.verifikasi_petani');
        Route::delete('/admin/petani/hapus/{id}', [AdminController::class, 'hapusPetani'])->name('admin.hapus_petani');

        // Kelola Data Bibit
        Route::get('/admin/data-bibit', [BibitController::class, 'index'])->name('admin.data_bibit');
        Route::post('/admin/data-bibit/store', [BibitController::class, 'store'])->name('admin.store_bibit');
        Route::delete('/admin/data-bibit/destroy/{id}', [BibitController::class, 'destroy'])->name('admin.data_bibit.destroy');

        // Menu Admin Lainnya
        Route::get('/admin/data-periode', function () { return view('layouts.admin.data_periode'); })->name('admin.data_periode');
        Route::get('/admin/data-lahan', function () { return view('layouts.admin.data_lahan'); })->name('admin.data_lahan');
        Route::get('/admin/riwayat-transaksi', function () { return view('layouts.admin.riwayat_transaksi'); })->name('admin.riwayat_transaksi');
    });

    // 2. KHUSUS ROLE: PETANI
    Route::middleware(['checkRole:petani'])->group(function () {
        Route::get('/dashboard-petani', [PetaniController::class, 'dashboard'])->name('petani.dashboard');
        Route::get('/profil-petani', [PetaniController::class, 'index'])->name('petani.profil');
        Route::post('/profil-petani/update', [PetaniController::class, 'updateProfil'])->name('petani.update');

        Route::get('/beli-bibit', function () { return view('petani.beli_bibit'); })->name('petani.beli_bibit');
        Route::get('/riwayat-pembelian', function () { return view('petani.riwayat'); })->name('petani.riwayat');
    });
});