<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\JenisKelas;
use App\Models\Mahasiswa;

class Kelas extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'kelas';
    protected $guarded = [];

    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_id');
    }

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }

    public function jenisKelas()
    {
        return $this->belongsTo(JenisKelas::class);
    }

    public function ketua()
    {
        return $this->belongsTo(Mahasiswa::class, 'ketua_id');
    }
}
