<?php

namespace App\Models\Publikasi;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
// USE MODELS
use App\Models\Publikasi\Galeri;

class GaleriFoto extends Model
{
    use SoftDeletes;
    
    protected $table = 'galeris_foto';
    protected $guarded = [];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class, 'galeri_id');
    }
}
