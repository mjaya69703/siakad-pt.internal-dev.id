<?php

namespace App\Models\Keuangan;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;

class RiwayatPembayaran extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'riwayat_pembayarans';
    protected $guarded = [];
}
