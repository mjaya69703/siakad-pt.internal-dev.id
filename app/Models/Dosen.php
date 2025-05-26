<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
    use HasFactory;
    
    protected $guarded=[];

    public function getTypeAttribute($value)
    {
        $types = [
            0 => 'Dosen Non-Aktif',                    // => Prefix dosen-nonaktif  => For Dosen Non-Aktif
            1 => 'Dosen Aktif',                        // => Prefix dosen           => For Dosen Aktif
        ];

        return isset($types[$value]) ? $types[$value] : 'Unknown';
    }

    public function getPhotoAttribute($value)
    {
        return $value == 'default.jpg' ? asset('storage/images/profile/default.jpg') : asset('storage/images/profile/users/' . $value);
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
            0 => 'dosen-nonaktif.',
            1 => 'dosen.',
        ];

        // Jika type valid, kembalikan prefixnya, kalau tidak 'unknown'
        return isset($prefixes[$this->attributes['type']]) ? $prefixes[$this->attributes['type']] : 'unknown';
    }

    public function getDsnStatAttribute($value)
    {
        $dsnstats = [
            0 => 'Dosen Tidak Aktif',
            1 => 'Dosen Aktif',
        ];

        return isset($dsnstats[$value]) ? $dsnstats[$value] : 'Unknown';
    }

    public function getRawDsnStatAttribute()
    {
        return $this->attributes['dsn_stat'];
    }
}
