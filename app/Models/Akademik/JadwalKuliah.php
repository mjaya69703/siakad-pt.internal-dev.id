<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Akademik\ProgramStudi;

class JadwalKuliah extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'jadwal_kuliahs';
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'jadwal_kelas', 'jadwal_id', 'kelas_id');
    }
}
