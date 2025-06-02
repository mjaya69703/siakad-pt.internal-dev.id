<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Akademik\ProgramStudi;

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
}
