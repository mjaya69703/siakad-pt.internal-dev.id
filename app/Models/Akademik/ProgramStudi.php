<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Akademik\Fakultas;
use App\Models\Akademik\JenjangPendidikan;
use App\Models\Dosen;

class ProgramStudi extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'program_studis';
    protected $guarded = [];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
    public function kaprodi()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function jenjang()
    {
        return $this->belongsTo(JenjangPendidikan::class, 'jenjang_id');
    }
}
