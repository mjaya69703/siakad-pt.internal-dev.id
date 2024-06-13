<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentTask extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jadkul()
    {
        return $this->belongsTo(JadwalKuliah::class, 'jadkul_id',);
    }
}