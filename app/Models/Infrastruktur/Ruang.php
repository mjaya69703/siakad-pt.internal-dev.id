<?php

namespace App\Models\Infrastruktur;

// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Infrastruktur\Gedung;
use App\Models\Infrastruktur\MutasiBarang;
use App\Models\Infrastruktur\inventarisBarang;

class Ruang extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'ruangs';
    protected $guarded = [];

    public function gedung()
    {
        return $this->belongsTo(Gedung::class, 'gedung_id');
    }

    public function inventarisBarang()
    {
        return $this->hasMany(InventarisBarang::class, 'lokasi_id');
    }

    public function mutasiBarangAwal()
    {
        return $this->hasMany(MutasiBarang::class, 'lokasi_awal');
    }

    public function mutasiBarangAkhir()
    {
        return $this->hasMany(MutasiBarang::class, 'lokasi_akhir');
    }
}
