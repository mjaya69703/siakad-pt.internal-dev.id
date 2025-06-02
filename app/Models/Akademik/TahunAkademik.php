<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
class TahunAkademik extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'tahun_akademiks';
    protected $guarded = [];
}
