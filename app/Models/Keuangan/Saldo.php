<?php

namespace App\Models\Keuangan;

// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Keuangan\TagihanKuliah;

class Saldo extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'saldos';
    protected $guarded = [];
}
