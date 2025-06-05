<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\WaktuKuliah;

class JenisKelas extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'jenis_kelas';
    protected $guarded = [];

    // public function prodi()
    // {
    //     return $this->belongsTo(ProgramStudi::class);
    // }

    public function waktuKuliah()
    {
        return $this->hasMany(WaktuKuliah::class, 'jenis_kelas_id');
    }
}
