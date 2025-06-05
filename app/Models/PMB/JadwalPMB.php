<?php

namespace App\Models\PMB;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\PMB\GelombangPendaftaran;

class JadwalPMB extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'jadwal_p_m_b_s';
    protected $guarded = [];

    public function gelombang()
    {
        return $this->belongsTo(GelombangPendaftaran::class, 'gelombang_id');
    }
}
