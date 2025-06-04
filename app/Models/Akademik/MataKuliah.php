<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Akademik\ProgramStudi;

class MataKuliah extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'mata_kuliahs';
    protected $guarded = [];

    // public function prodi()
    // {
    //     return $this->belongsTo(ProgramStudi::class);
    // }
}
