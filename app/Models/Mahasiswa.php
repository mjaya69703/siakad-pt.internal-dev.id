<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HasLogAktivitas;

class Mahasiswa extends Authenticatable
{
    use HasFactory, SoftDeletes, HasLogAktivitas;

    protected $table = 'mahasiswas';
    protected $guarded=[];

    public function getTypeAttribute($value)
    {
        $types = [
            0 => 'Calon Mahasiswa Baru',               // => Prefix camaba      => For Calon Mahasiswa Baru
            1 => 'Mahasiswa Aktif',                    // => Prefix mahasiswa   => For Mahasiswa Aktif
            2 => 'Mahasiswa Non-Aktif',                // => Prefix nonaktif    => For Mahasiswa Non-Aktif
            3 => 'Mahasiswa Alumni',                   // => Prefix alumni      => For Mahasiswa Alumni
        ];

        return isset($types[$value]) ? $types[$value] : 'Unknown';
    }

    public function getPhotoAttribute($value)
    {
        return $value == 'default.jpg' ? asset('storage/images/profile/default.jpg') : asset('storage/images/profile/' . $value);
    }


    public function getRawTypeAttribute()
    {
        return $this->attributes['type'];
    }

    public function getWaPhoneAttribute()
    {
        if ($this->phone) {
            return preg_replace('/^0/', '62', $this->phone);
        }

        return null;
    }

    public function getPrefixAttribute()
    {
        $prefixes = [
            0 => 'camaba.',
            1 => 'mahasiswa.',
            2 => 'mahasiswa-nonaktif.',
            3 => 'alumni.',
        ];

        // Jika type valid, kembalikan prefixnya, kalau tidak 'unknown'
        return isset($prefixes[$this->attributes['type']]) ? $prefixes[$this->attributes['type']] : 'unknown';
    }

    // WILL BE DELETED
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
