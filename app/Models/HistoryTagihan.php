<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryTagihan extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo(Mahasiswa::class, 'users_id');
    }
    public function tagihan()
    {
        return $this->belongsTo(TagihanKuliah::class, 'tagihan_code');
    }
}
