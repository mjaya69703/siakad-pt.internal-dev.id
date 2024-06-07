<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getTypeAttribute($value)
    {
        $types = [
            0 => 'Web Administrator',       // => Prefix web-admin  => For Website Development
            1 => 'Departement Finance',     // => Prefix finance    => For Pelayanan Administrasi Umum dan Keuangan ( BAU )
            2 => 'Departement Officer',     // => Prefix officer    => For Penerimaan Mahasiswa, Etc. ( Officer Staff )
            3 => 'Departement Academic',    // => Prefix academic   => For Pelayanan Akademik ( BAAK Staff )
            4 => 'Departement Admin',       // => Prefix admin      => For Penghubung antar departement dan dosen
            5 => 'Departement Support',     // => Prefix support    => For IT Technical, Lab Technician, Helper
        ];

        return isset($types[$value]) ? $types[$value] : 'Unknown';
    }

    public function getRawTypeAttribute()
    {
        return $this->attributes['type'];
    }

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
