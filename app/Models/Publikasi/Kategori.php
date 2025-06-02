<?php

namespace App\Models\Publikasi;

// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Publikasi\Kategori;
use App\Models\Publikasi\Berita;
use App\Models\Publikasi\Pengumuman;
use App\Models\Publikasi\Galeri;

class Kategori extends Model
{
    use SoftDeletes, HasLogAktivitas;
    
    protected $table = 'kategoris';
    protected $guarded = [];

    public function beritas()
    {
        return $this->hasMany(Berita::class, 'kategori_id');
    }

    public function pengumumans()
    {
        return $this->hasMany(Pengumuman::class, 'kategori_id');
    }

    public function galeris()
    {
        return $this->hasMany(Galeri::class, 'kategori_id');
    }
}
