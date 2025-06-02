<?php

namespace App\Models\Publikasi;

// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Publikasi\Kategori;

class Berita extends Model
{
    use SoftDeletes, HasLogAktivitas;
    
    protected $table = 'beritas';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
