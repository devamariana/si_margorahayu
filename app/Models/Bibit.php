<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibit extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan di database
     */
    protected $table = 'bibits';

    /**
     * Kolom yang boleh diisi secara massal (Mass Assignable)
     * Pastikan semua kolom ini sama persis dengan yang ada di SQLyog
     */
    protected $fillable = [
        'nama_bibit', 
        'jenis', 
        'stok', 
        'harga_subsidi', 
        'deskripsi', 
        'gambar', 
        'status'
    ];

    /**
     * Secara default Laravel menganggap primary key adalah 'id'.
     * Jika di SQLyog kamu namanya bukan 'id', silakan ganti di bawah ini.
     */
    protected $primaryKey = 'id';

    /**
     * Aktifkan timestamps jika kamu memiliki kolom created_at dan updated_at di SQLyog.
     * Ini penting agar fungsi Bibit::latest() bisa bekerja untuk notifikasi.
     */
    public $timestamps = true;
}