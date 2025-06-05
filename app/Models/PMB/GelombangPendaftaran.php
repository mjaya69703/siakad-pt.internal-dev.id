<?php

namespace App\Models\PMB;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\PMB\JalurPendaftaran;
use App\Models\Pendaftaran\Pendaftar;

class GelombangPendaftaran extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'gelombang_pendaftarans';
    protected $guarded = [];

    public function jalur()
    {
        return $this->belongsTo(JalurPendaftaran::class, 'jalur_id');
    }

    public function jadwals()
    {
        return $this->hasMany(JadwalPMB::class, 'gelombang_id');
    }
    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'gelombang_id');
    }
}
