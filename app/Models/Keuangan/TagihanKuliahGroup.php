<?php

namespace App\Models\Keuangan;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Kelas;
use App\Models\PMB\GelombangPendaftaran;
use App\Models\PMB\JalurPendaftaran;
use App\Models\Akademik\TahunAkademik;

class TagihanKuliahGroup extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'tagihan_kuliah_groups';
    protected $guarded = [];

    protected $casts = [
        'due_date' => 'date',
        'amount' => 'integer',
    ];

    // Relasi dengan TagihanKuliah
    public function tagihanKuliahs()
    {
        return $this->hasMany(TagihanKuliah::class, 'group_id');
    }

    // Relasi dengan Program Studi
    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }

    // Relasi dengan Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Relasi dengan Gelombang
    public function gelombang()
    {
        return $this->belongsTo(GelombangPendaftaran::class, 'gelombang_id');
    }

    // Relasi dengan Jalur
    public function jalur()
    {
        return $this->belongsTo(JalurPendaftaran::class, 'jalur_id');
    }

    // Relasi dengan Tahun Akademik
    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_id');
    }

    // Scope untuk filter berdasarkan status
    public function scopeDraft($query)
    {
        return $query->where('status', 'Draft');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'Published');
    }

    public function scopeArchived($query)
    {
        return $query->where('status', 'Archived');
    }
}