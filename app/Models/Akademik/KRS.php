<?php

namespace App\Models\Akademik;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\KrsDetail;

class KRS extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'k_r_s';
    protected $guarded = [];

    protected $casts = [
        'approved_at' => 'datetime',
        'periode_mulai' => 'date',
        'periode_selesai' => 'date',
        'ipk_sebelumnya' => 'decimal:2',
    ];

    // ACCESSOR METHODS
    public function getStatusAttribute($value)
    {
        $statuses = [
            'Draft' => 'Draft',
            'Diajukan' => 'Diajukan',
            'Disetujui' => 'Disetujui',
            'Ditolak' => 'Ditolak'
        ];

        return $statuses[$value] ?? 'Unknown';
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'Draft' => 'badge bg-secondary',
            'Diajukan' => 'badge bg-warning',
            'Disetujui' => 'badge bg-success',
            'Ditolak' => 'badge bg-danger'
        ];

        return $badges[$this->attributes['status']] ?? 'badge bg-secondary';
    }

    public function getIsEditableAttribute()
    {
        return in_array($this->attributes['status'], ['Draft', 'Ditolak']);
    }

    public function getIsApprovableAttribute()
    {
        return $this->attributes['status'] === 'Diajukan';
    }

    public function getBatasSksAttribute()
    {
        // Logika penentuan batas SKS berdasarkan IPK
        $ipk = $this->ipk_sebelumnya;

        if ($ipk >= 3.50) {
            return 24; // Maksimal 24 SKS
        } elseif ($ipk >= 3.00) {
            return 22; // Maksimal 22 SKS
        } elseif ($ipk >= 2.50) {
            return 20; // Maksimal 20 SKS
        } elseif ($ipk >= 2.00) {
            return 18; // Maksimal 18 SKS
        } else {
            return 15; // Maksimal 15 SKS untuk IPK < 2.00
        }
    }

    public function getSisaSksAttribute()
    {
        return $this->batas_sks - $this->total_sks;
    }

    // RELATIONSHIP METHODS
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_id');
    }

    public function dosenPA()
    {
        return $this->belongsTo(Dosen::class, 'dosen_pa_id');
    }

    public function details()
    {
        return $this->hasMany(KrsDetail::class, 'krs_id');
    }

    public function detailsAktif()
    {
        return $this->hasMany(KrsDetail::class, 'krs_id')->where('status', 'Aktif');
    }

    // SCOPE METHODS
    public function scopeByMahasiswa($query, $mahasiswaId)
    {
        return $query->where('mahasiswa_id', $mahasiswaId);
    }

    public function scopeByTahunAkademik($query, $takaId)
    {
        return $query->where('taka_id', $takaId);
    }

    public function scopeBySemester($query, $semester)
    {
        return $query->where('semester', $semester);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // BUSINESS LOGIC METHODS
    public function hitungTotalSks()
    {
        $this->total_sks = $this->detailsAktif()->sum('sks');
        $this->save();
        return $this->total_sks;
    }

    public function canAddMatakuliah($sks)
    {
        return ($this->total_sks + $sks) <= $this->batas_sks;
    }

    public function approve($dosenPaId = null, $notes = null)
    {
        $this->update([
            'status' => 'Disetujui',
            'dosen_pa_id' => $dosenPaId,
            'approved_at' => now(),
            'notes' => $notes
        ]);
    }

    public function reject($notes = null)
    {
        $this->update([
            'status' => 'Ditolak',
            'notes' => $notes
        ]);
    }

    public function submit()
    {
        if ($this->total_sks > 0) {
            $this->update(['status' => 'Diajukan']);
            return true;
        }
        return false;
    }
}
