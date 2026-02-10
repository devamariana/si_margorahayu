<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Pastikan memanggil model User
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Menampilkan daftar semua petani untuk Admin
     */
    public function dataPetani()
    {
        // Mengambil user yang memiliki role 'petani'
        $petanis = User::where('role', 'petani')->get();

        // Mengirim data ke view data_petani.blade.php
        return view('layouts.admin.data_petani', compact('petanis'));
    }
}