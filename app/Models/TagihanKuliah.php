<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanKuliah extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prokuu()
    {
        return $this->belongsTo(ProgramKuliah::class, 'proku_id');
    }
    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'users_id');
    }
}
