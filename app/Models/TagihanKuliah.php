<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanKuliah extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function proku()
    {
        return $this->belongsTo(ProgramKuliah::class, 'proku_id');
    }
    public function users()
    {
        return $this->belongsTo(Mahasiswa::class, 'users_id');
    }
    public function history()
    {
        return $this->belongsTo(HistoryTagihan::class, 'code');
    }
}
