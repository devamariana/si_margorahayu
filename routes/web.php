<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
// Tambahkan pemanggilan Controller baru di sini
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Petani\PetaniController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Jalur Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']); 

// Jalur Registrasi
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// --- BAGIAN PETANI ---
Route::get('/dashboard-petani', function () {
    return view('petani.dashboard');
})->name('petani.dashboard');

// Diperbaiki agar menggunakan PetaniController untuk menampilkan profil
Route::get('/profil-petani', [PetaniController::class, 'index'])->name('petani.profil');

// TAMBAHAN: Jalur untuk menyimpan perubahan profil (POST)
Route::post('/profil-petani/update', [PetaniController::class, 'updateProfil'])->name('petani.update');

Route::get('/beli-bibit', function () {
    return view('petani.beli_bibit');
})->name('petani.beli_bibit');

Route::get('/riwayat-pembelian', function () {
    return view('petani.riwayat');
})->name('petani.riwayat');


// Jalur Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// --- BAGIAN ADMIN ---
Route::get('/admin/dashboard', function () {
    return view('layouts.admin.dashboard'); 
})->name('admin.dashboard');

// Diperbaiki agar menggunakan AdminController untuk mengambil data dari database
Route::get('/admin/data-petani', [AdminController::class, 'dataPetani'])->name('admin.data_petani');

Route::get('/admin/data-bibit', function () {
    return view('layouts.admin.data_bibit');
})->name('admin.data_bibit');

Route::get('/admin/data-periode', function () {
    return view('layouts.admin.data_periode');
})->name('admin.data_periode');

Route::get('/admin/data-lahan', function () {
    return view('layouts.admin.data_lahan');
})->name('admin.data_lahan');

Route::get('/admin/riwayat-transaksi', function () {
    return view('layouts.admin.riwayat_transaksi');
})->name('admin.riwayat_transaksi');