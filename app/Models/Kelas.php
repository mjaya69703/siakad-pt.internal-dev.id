<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
    public function pstudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'pstudi_id');
    }
    public function proku()
    {
        return $this->belongsTo(ProgramKuliah::class, 'proku_id');
    }
    public function taka()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_id');
    }
}
