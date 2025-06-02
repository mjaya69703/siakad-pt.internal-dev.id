<?php

namespace App\Models\Publikasi;

// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Publikasi\Kategori;
use App\Models\Publikasi\GaleriFoto;

class Galeri extends Model
{
    use SoftDeletes, HasLogAktivitas;
    
    protected $table = 'galeris';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function fotos()
    {
        return $this->hasMany(GaleriFoto::class, 'galeri_id');
    }
}
