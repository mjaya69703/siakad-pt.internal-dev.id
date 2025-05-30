<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
// USE MODELS
use App\Models\Dosen;

class Fakultas extends Model
{
    use SoftDeletes;

    protected $table = 'fakultas';
    protected $guarded = [];

    public function dekan()
    {
        return $this->belongsTo(Dosen::class);
    }
}
