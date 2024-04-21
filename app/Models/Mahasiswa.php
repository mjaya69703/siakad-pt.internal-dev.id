<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $guard = "admin";
    protected $guarded=[];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getMhsStatAttribute($value)
    {
        $mhsstats = [
            0 => 'Calon Mahasiswa',
            1 => 'Mahasiswa Aktif',
            2 => 'Mahasiswa Non-Aktif',
            3 => 'Mahasiswa Cuti',
            4 => 'Mahasiswa Lulus',
            5 => 'Mahasiswa Mutasi',
            6 => 'Mahasiswa Mengundurkan Diri',
            7 => 'Mahasiswa Drop Out',
        ];

        return isset($mhsstats[$value]) ? $mhsstats[$value] : 'Unknown';
    }

    public function getRawMhsStatAttribute()
    {
        return $this->attributes['mhs_stat'];
    }

    public function getPhoneAttribute($value)
    {
        // Periksa apakah nomor telepon dimulai dengan "0"
        if (strpos($value, '0') === 0) {
            // Jika ya, ubah menjadi "+62" dan hapus angka "0" di awal
            return '+62' . substr($value, 1);
        }

        // Jika tidak dimulai dengan "0", biarkan seperti itu
        return $value;
    }
}
