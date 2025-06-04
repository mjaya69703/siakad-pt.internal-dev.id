<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Akademik\JenisKelas;

class WaktuKuliah extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'waktu_kuliahs';
    protected $guarded = [];

    public function jenisKelas()
    {
        return $this->belongsTo(JenisKelas::class, 'jenis_kelas_id');
    }
}
