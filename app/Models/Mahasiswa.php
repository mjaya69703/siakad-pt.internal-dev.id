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
            3 => 'Mahasiswa Alumni',
        ];

        return isset($mhsstats[$value]) ? $mhsstats[$value] : 'Unknown';
    }
    public function getRawMhsStatAttribute()
    {
        return $this->attributes['mhs_stat'];
    }
    public function getAgamaAttribute($value)
    {
        $mhsrelis = [
            0 => 'Belum Memilih',
            1 => 'Agama Islam',
            2 => 'Agama Kristen Katholik',
            3 => 'Agama Kristen Protestan',
            4 => 'Agama Hindu',
            5 => 'Agama Buddha',
            6 => 'Agama Konghuchu',
            7 => 'Kepercayaan Lainnya',
        ];

        return isset($mhsrelis[$value]) ? $mhsrelis[$value] : 'Unknown';
    }


    public function getRawMhsReliAttribute()
    {
        return $this->attributes['mhs_reli'];
    }

    public function getMhsPhoneAttribute($value)
    {
        // Periksa apakah nomor telepon dimulai dengan "0"
        if (strpos($value, '0') === 0) {
            // Jika ya, ubah menjadi "+62" dan hapus angka "0" di awal
            return '62' . substr($value, 1);
        }

        // Jika tidak dimulai dengan "0", biarkan seperti itu
        return $value;
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'class_id');
    }
    public function taka()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_id');
    }
}
