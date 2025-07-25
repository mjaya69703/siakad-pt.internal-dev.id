<?php

namespace App\Models\Akademik;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
use App\Models\Akademik\KRS;
use App\Models\Akademik\MataKuliah;
use App\Models\Akademik\Kelas;
use App\Models\Dosen;

class KrsDetail extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'krs_details';
    protected $guarded = [];

    // ACCESSOR METHODS
    public function getStatusAttribute($value)
    {
        $statuses = [
            'Aktif' => 'Aktif',
            'Batal' => 'Batal',
            'Mengulang' => 'Mengulang'
        ];

        return $statuses[$value] ?? 'Unknown';
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'Aktif' => 'badge bg-success',
            'Batal' => 'badge bg-danger',
            'Mengulang' => 'badge bg-warning'
        ];

        return $badges[$this->attributes['status']] ?? 'badge bg-secondary';
    }

    public function getIsAktifAttribute()
    {
        return $this->attributes['status'] === 'Aktif';
    }

    // RELATIONSHIP METHODS
    public function krs()
    {
        return $this->belongsTo(KRS::class, 'krs_id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'matkul_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    // SCOPE METHODS
    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }

    public function scopeByMatakuliah($query, $matkulId)
    {
        return $query->where('matkul_id', $matkulId);
    }

    public function scopeByKelas($query, $kelasId)
    {
        return $query->where('kelas_id', $kelasId);
    }

    // BUSINESS LOGIC METHODS
    public function batalkan($notes = null)
    {
        $this->update([
            'status' => 'Batal',
            'notes' => $notes
        ]);

        // Update total SKS di KRS
        $this->krs->hitungTotalSks();
    }

    public function aktifkan()
    {
        $this->update(['status' => 'Aktif']);

        // Update total SKS di KRS
        $this->krs->hitungTotalSks();
    }

    public function checkPrerequisites()
    {
        // Logic untuk cek prasyarat mata kuliah
        // Akan diimplementasi sesuai aturan prasyarat yang ada
        return true;
    }

    // EVENT METHODS
    protected static function booted()
    {
        static::created(function ($krsDetail) {
            $krsDetail->krs->hitungTotalSks();
        });

        static::updated(function ($krsDetail) {
            $krsDetail->krs->hitungTotalSks();
        });

        static::deleted(function ($krsDetail) {
            $krsDetail->krs->hitungTotalSks();
        });
    }
}
