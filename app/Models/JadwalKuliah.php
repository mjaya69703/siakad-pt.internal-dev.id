<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKuliah extends Model
{
    use HasFactory;

    protected $guarded = [];

    // ATTRIBUTES ID HARI
    public function getDaysIdAttribute($value)
    {
        $daysids = [
            0 => 'Minggu',
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => "Jum'at",
            6 => 'Sabtu',
        ];

        return isset($daysids[$value]) ? $daysids[$value] : 'Unknown';
    }

    public function getRawDaysIdAttribute()
    {
        return $this->attributes['days_id'];
    }

    // ATTRIBUTES ID METODE PERTEMUAN
    public function getMethIdAttribute($value)
    {
        $methids = [
            0 => 'Tatap Muka',
            1 => 'Teleconference',
        ];

        return isset($methids[$value]) ? $methids[$value] : 'Unknown';
    }

    public function getRawMethIdAttribute()
    {
        return $this->attributes['meth_id'];
    }

    // ATTRIBUTES ID PERTEMUAN
    public function getPertIdAttribute($value)
    {
        $pertids = [
            1 => 'Pertemuan 1',
            2 => 'Pertemuan 2',
            3 => 'Pertemuan 3',
            4 => 'Pertemuan 4',
            5 => 'Pertemuan 5',
            6 => 'Pertemuan 6',
            7 => 'Pertemuan 7',
            8 => 'Pertemuan 8',
            9 => 'Pertemuan 9',
            10 => 'Pertemuan 10',
            11 => 'Pertemuan 11',
            12 => 'Pertemuan 12',
            13 => 'Pertemuan 13',
            14 => 'Pertemuan 14',
            15 => 'Pertemuan 15',
            15 => 'Pertemuan 15',
            16 => 'Pertemuan 16',
        ];

        return isset($pertids[$value]) ? $pertids[$value] : 'Unknown';
    }

    public function getRawPertIdAttribute()
    {
        return $this->attributes['pert_id'];
    }

    public function matkul()
    {
        return $this->belongsTo(MataKuliah::class, 'makul_id',);
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang_id');
    }
}
