<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // 1. Kasih tahu Laravel nama tabelnya
    protected $table = 'transaksis';

    // 2. Daftar kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'petani_id',
        'bibit_id',
        'jumlah',
        'status',
    ];

    /**
     * Relasi ke model Petani
     * Satu transaksi dimiliki oleh satu petani
     */
    public function petani()
    {
        return $this->belongsTo(Petani::class, 'petani_id');
    }

    /**
     * Relasi ke model Bibit
     * Satu transaksi mencatat satu jenis bibit
     */
    public function bibit()
    {
        return $this->belongsTo(Bibit::class, 'bibit_id');
    }
}