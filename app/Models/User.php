<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User\Mahasiswa;
use App\Models\User\Dosen;
use App\Models\User\Staff;
use App\Traits\HasLogAktivitas;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory,SoftDeletes, Notifiable, HasLogAktivitas;


    protected $table = 'users';
    protected $guarded = [];

    public function getTypeAttribute($value)
    {
        $types = [
            0 => 'Web Administrator',               // => Prefix web-admin  => For Website Development
            1 => 'Departement Akademik',            // => Prefix akademik   => For Pelayanan Akademik (BAAK Staff)
            2 => 'Departement Keuangan',            // => Prefix finance    => For Pelayanan Keuangan dan Pembayaran
            3 => 'Departement Kemahasiswaan',       // => Prefix kemahasiswaan => For Kegiatan dan Organisasi Mahasiswa
            4 => 'Departement Infrastruktur & IT',  // => Prefix it         => For Pengelolaan Infrastruktur dan Sistem
            5 => 'Departement Perpustakaan',        // => Prefix library    => For Pengelolaan Perpustakaan dan Peminjaman
            6 => 'Departement Umum',                // => Prefix umum       => For Administrasi Umum, Fasilitas, dan Kepegawaian (SDM)
            7 => 'Departement Admisi'               // => Prefix admisi     => For Penerimaan Mahasiswa Baru (PMB) dan Pendaftaran
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
            0 => 'web-admin.',
            1 => 'akademik.',
            2 => 'finance.',
            3 => 'kemahasiswaan.',
            4 => 'it.',
            5 => 'library.',
            6 => 'umum.',
            7 => 'admisi.',
        ];

        // Jika type valid, kembalikan prefixnya, kalau tidak 'unknown'
        return isset($prefixes[$this->attributes['type']]) ? $prefixes[$this->attributes['type']] : 'unknown';
    }


    // WILL BE DELETED
    public function getAgamaAttribute($value)
    {
        $relis = [
            0 => 'Belum Memilih',
            1 => 'Agama Islam',
            2 => 'Agama Kristen Katholik',
            3 => 'Agama Kristen Protestan',
            4 => 'Agama Hindu',
            5 => 'Agama Buddha',
            6 => 'Agama Konghuchu',
            7 => 'Kepercayaan Lainnya',
        ];

        return isset($relis[$value]) ? $relis[$value] : 'Unknown';
    }


    public function getRawReliAttribute()
    {
        return $this->attributes['reli'];
    }

    public function getPhoneAttribute($value)
    {
        // Periksa apakah nomor telepon dimulai dengan "0"
        if (strpos($value, '0') === 0) {
            // Jika ya, ubah menjadi "+62" dan hapus angka "0" di awal
            return '62' . substr($value, 1);
        }

        // Jika tidak dimulai dengan "0", biarkan seperti itu
        return $value;
    }
}
