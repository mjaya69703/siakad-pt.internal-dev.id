<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Akademik\ProgramStudi;
use App\Models\Dosen;
use App\Models\Infrastruktur\Ruang;
use App\Models\Akademik\MataKuliah;
use App\Models\Akademik\JenisKelas;
use App\Models\Akademik\WaktuKuliah;

class JadwalKuliah extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'jadwal_kuliahs';
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'jadwal_kelas', 'jadwal_id', 'kelas_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang_id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'matkul_id');
    }

    public function jenisKelas()
    {
        return $this->belongsTo(JenisKelas::class, 'jenis_kelas_id');
    }

    public function waktuKuliah()
    {
        return $this->belongsTo(WaktuKuliah::class, 'waktu_kuliah_id');
    }
}
