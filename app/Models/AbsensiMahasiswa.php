<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiMahasiswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAbsenTypeAttribute($value)
    {
        $absentypes = [
            'H' => 'Hadir',
            'S' => 'Sakit',
            'I' => 'Izin',
        ];

        return isset($absentypes[$value]) ? $absentypes[$value] : 'Unknown';
    }

    public function getRawAbsenTypeAttribute()
    {
        return $this->attributes['dsn_stat'];
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'author_id');
    }
    public function jadkul()
    {
        return $this->belongsTo(JadwalKuliah::class, 'jadkul_code', 'code');
    }
}
