<?php

namespace App\Models\Pendaftaran;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Mahasiswa;
use App\Models\PMB\JalurPendaftaran;
use App\Models\PMB\GelombangPendaftaran;

class Pendaftar extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'pendaftars';
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function jalur()
    {
        return $this->belongsTo(JalurPendaftaran::class, 'jalur_id');
    }

    public function gelombang()
    {
        return $this->belongsTo(GelombangPendaftaran::class, 'gelombang_id');
    }

    public function dokumen()
    {
        return $this->hasMany(DokumenPMB::class, 'pendaftar_id');
    }
}
