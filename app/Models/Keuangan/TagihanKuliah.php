<?php

namespace App\Models\Keuangan;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS

class TagihanKuliah extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'tagihan_kuliahs';
    protected $guarded = [];
}
