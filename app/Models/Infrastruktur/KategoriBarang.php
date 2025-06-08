<?php

namespace App\Models\Infrastruktur;

// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Infrastruktur\Barang;

class KategoriBarang extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'kategori_barangs';
    protected $guarded = [];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }
}
