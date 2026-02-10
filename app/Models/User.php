<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Hubungkan model ini ke tabel 'petanis'
     */
    protected $table = 'petanis';

    /**
     * TAMBAHAN: Jika di SQLyog kolom kuncimu bukan bernama 'id', 
     * tuliskan namanya di sini (contoh: 'id_petani'). 
     * Jika tetap 'id', baris ini tidak akan merusak apapun.
     */
    protected $primaryKey = 'id'; 

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'username', 'password', 'role', 'no_hp', 
        'nik', 'nama_lengkap', 'luas_lahan', 'alamat', 
        'foto_ktp', 'foto_kk', 'status' // Tambahkan 'status' di sini
    ];

    /**
     * Beritahu Laravel login menggunakan username, bukan email
     */
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}