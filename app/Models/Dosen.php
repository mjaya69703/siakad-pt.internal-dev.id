<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
    use HasFactory;
    
    protected $guarded=[];

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
