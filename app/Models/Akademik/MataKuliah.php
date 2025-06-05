<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Kurikulum;
use App\Models\Dosen;

class MataKuliah extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'mata_kuliahs';
    protected $guarded = [];

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    public function prasyarat()
    {
        return $this->belongsTo(MataKuliah::class, 'requi_id');
    }

    public function mataKuliahPrasyarat()
    {
        return $this->hasMany(MataKuliah::class, 'requi_id');
    }

    public function dosen1()
    {
        return $this->belongsTo(Dosen::class, 'dosen1_id');
    }

    public function dosen2()
    {
        return $this->belongsTo(Dosen::class, 'dosen2_id');
    }

    public function dosen3()
    {
        return $this->belongsTo(Dosen::class, 'dosen3_id');
    }
}
