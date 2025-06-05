<?php

namespace App\Models\PMB;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\PMB\JalurPendaftaran;

class BiayaPendaftaran extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'biaya_pendaftarans';
    protected $guarded = [];

    public function jalur()
    {
        return $this->belongsTo(JalurPendaftaran::class, 'jalur_id');
    }
}
