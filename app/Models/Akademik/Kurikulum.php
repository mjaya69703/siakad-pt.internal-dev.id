<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\TahunAkademik;

class Kurikulum extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'kurikulums';
    protected $guarded = [];

    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }
    // public function kaprodi()
    // {
    //     return $this->belongsTo(Dosen::class);
    // }

    public function tahunAkademikStart()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_start');
    }

    public function tahunAkademikEnded()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_ended');
    }
}
