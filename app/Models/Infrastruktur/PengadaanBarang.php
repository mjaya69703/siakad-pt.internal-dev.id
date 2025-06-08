<?php

namespace App\Models\Infrastruktur;

// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Infrastruktur\Barang;

class PengadaanBarang extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'pengadaan_barangs';
    protected $guarded = [];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
