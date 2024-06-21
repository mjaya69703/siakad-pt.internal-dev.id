<?php

namespace App\Models\FeedBack;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FBPerkuliahan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jadkul()
    {
        return $this->belongsTo(\App\Models\JadwalKuliah::class, 'fb_jakul_code', 'code');
    }
}
