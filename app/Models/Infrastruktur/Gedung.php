<?php

namespace App\Models\Infrastruktur;

// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Infrastruktur\Ruang;

class Gedung extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'gedungs';
    protected $guarded = [];

    public function ruangs()
    {
        return $this->hasMany(Ruang::class, 'gedung_id');
    }
}
