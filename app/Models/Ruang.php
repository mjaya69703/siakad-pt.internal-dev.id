<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTypeAttribute($value)
    {
        $types = [
            0 => 'Ruang Kelas',
            1 => 'Ruang Laboratorium',
            2 => 'Ruang Kerja',
            3 => 'Ruang Pribadi',
            4 => 'Fasilitas Umum',
        ];

        return isset($types[$value]) ? $types[$value] : 'Unknown';
    }

    public function getRawTypeAttribute()
    {
        return $this->attributes['type'];
    }

    public function gedung()
    {
        return $this->belongsTo(Gedung::class, 'gedu_id');
    }
}
