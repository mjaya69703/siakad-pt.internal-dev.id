<?php

namespace App\Models\PMB;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\PMB\PeriodePendaftaran;
use App\Models\Pendaftaran\Pendaftar;

class JalurPendaftaran extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'jalur_pendaftarans';
    protected $guarded = [];

    public function periode()
    {
        return $this->belongsTo(PeriodePendaftaran::class, 'periode_id');
    }

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'jalur_id');
    }

    public function biayas()
    {
        return $this->hasMany(BiayaPendaftaran::class, 'jalur_id');
    }

    public function syarats()
    {
        return $this->hasMany(SyaratPendaftaran::class, 'jalur_id');
    }

    public function gelombangs()
    {
        return $this->hasMany(GelombangPendaftaran::class, 'jalur_id');
    }
}
