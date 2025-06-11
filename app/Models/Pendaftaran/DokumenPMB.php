<?php

namespace App\Models\Pendaftaran;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Pendaftaran\Pendaftar;
use App\Models\PMB\SyaratPendaftaran;

class DokumenPMB extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'dokumen_p_m_b_s';
    protected $guarded = [];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar_id');
    }

    public function syarat()
    {
        return $this->belongsTo(SyaratPendaftaran::class, 'syarat_id');
    }

    public static function jenisDokumenList()
    {
        return ['KTP', 'Ijazah', 'Foto', 'Transkrip', 'Surat Sehat'];
    }
}
