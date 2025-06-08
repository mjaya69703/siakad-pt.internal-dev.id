<?php

namespace App\Models\Infrastruktur;

// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Infrastruktur\KategoriBarang;
use App\Models\Infrastruktur\PengadaanBarang;
use App\Models\Infrastruktur\MutasiBarang;
use App\Models\Infrastruktur\InventarisBarang;

class Barang extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'barangs';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_id');
    }

    public function pengadaanBarang()
    {
        return $this->hasMany(PengadaanBarang::class, 'barang_id');
    }

    public function mutasiBarang()
    {
        return $this->hasMany(MutasiBarang::class, 'barang_id');
    }

    public function inventarisBarang()
    {
        return $this->hasMany(InventarisBarang::class, 'barang_id');
    }
}
