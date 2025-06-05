<?php

namespace App\Models\PMB;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Akademik\TahunAkademik;

class PeriodePendaftaran extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'periode_pendaftarans';
    protected $guarded = [];

    public function taka()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_id');
    }

    public function jalurs()
    {
        return $this->hasMany(JalurPendaftaran::class, 'periode_id');
    }
}
