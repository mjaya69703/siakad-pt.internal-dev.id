<?php

namespace App\Models\Infrastruktur;

// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Infrastruktur\Ruang;

class MutasiBarang extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'mutasi_barangs';
    protected $guarded = [];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function lokasiAwal()
    {
        return $this->belongsTo(Ruang::class, 'lokasi_awal');
    }

    public function lokasiAkhir()
    {
        return $this->belongsTo(Ruang::class, 'lokasi_akhir');
    }
}
