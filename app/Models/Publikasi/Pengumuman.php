<?php

namespace App\Models\Publikasi;

// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Publikasi\Kategori;

class Pengumuman extends Model
{
    use SoftDeletes, HasLogAktivitas;
    
    protected $table = 'pengumumen';
    protected $guarded = [];

    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
