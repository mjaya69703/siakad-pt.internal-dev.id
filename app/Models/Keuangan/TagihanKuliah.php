<?php

namespace App\Models\Keuangan;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Mahasiswa;
use App\Models\Akademik\TahunAkademik;
use App\Models\Keuangan\Biaya;
use App\Models\PMB\BiayaPendaftaran;

class TagihanKuliah extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'tagihan_kuliahs';
    protected $guarded = [];

    protected $casts = [
        'due_date' => 'date',
        'amount' => 'integer',
    ];

    // Relasi dengan TagihanKuliahGroup
    public function group()
    {
        return $this->belongsTo(TagihanKuliahGroup::class, 'group_id');
    }

    // Relasi dengan Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    // Relasi dengan Tahun Akademik
    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_id');
    }

    // Relasi dengan Biaya
    public function biaya()
    {
        return $this->belongsTo(Biaya::class, 'biaya_id');
    }

    // Relasi dengan Biaya PMB
    public function biayaPmb()
    {
        return $this->belongsTo(BiayaPendaftaran::class, 'biaya_pmb');
    }

    // Scope untuk filter berdasarkan status
    public function scopePending($query)
    {
        return $query->where('status', 'Pending');
    }

    public function scopeSukses($query)
    {
        return $query->where('status', 'Sukses');
    }

    public function scopeGagal($query)
    {
        return $query->where('status', 'Gagal');
    }
}