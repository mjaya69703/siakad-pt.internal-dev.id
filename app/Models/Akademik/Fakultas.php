<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Dosen;

class Fakultas extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'fakultas';
    protected $guarded = [];

    public function dekan()
    {
        return $this->belongsTo(Dosen::class);
    }
}
