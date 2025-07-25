<?php

namespace App\Models\Akademik;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
use App\Models\Mahasiswa;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\Nilai;

class KHS extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'k_h_s';
    protected $guarded = [];

    protected $casts = [
        'total_mutu' => 'decimal:2',
        'ips' => 'decimal:2',
        'total_mutu_kumulatif' => 'decimal:2',
        'ipk' => 'decimal:2',
        'published_at' => 'datetime',
    ];

    // ACCESSOR METHODS
    public function getStatusGenerateAttribute($value)
    {
        $statuses = [
            'Draft' => 'Draft',
            'Final' => 'Final',
            'Published' => 'Published'
        ];

        return $statuses[$value] ?? 'Unknown';
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'Draft' => 'badge bg-secondary',
            'Final' => 'badge bg-warning',
            'Published' => 'badge bg-success'
        ];

        return $badges[$this->attributes['status_generate']] ?? 'badge bg-secondary';
    }

    public function getStatusAkademikBadgeAttribute()
    {
        $badges = [
            'Aktif' => 'badge bg-success',
            'Cuti' => 'badge bg-warning',
            'DO' => 'badge bg-danger',
            'Lulus' => 'badge bg-primary',
            'Non-Aktif' => 'badge bg-secondary'
        ];

        return $badges[$this->status_akademik] ?? 'badge bg-secondary';
    }

    public function getPrediksiKelulusanBadgeAttribute()
    {
        $badges = [
            'Tepat Waktu' => 'badge bg-success',
            'Terlambat' => 'badge bg-warning',
            'Berisiko DO' => 'badge bg-danger',
            'Tidak Terprediksi' => 'badge bg-secondary'
        ];

        return $badges[$this->prediksi_kelulusan] ?? 'badge bg-secondary';
    }

    public function getIsEditableAttribute()
    {
        return $this->attributes['status_generate'] === 'Draft';
    }

    public function getIsPublishedAttribute()
    {
        return $this->attributes['status_generate'] === 'Published';
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

    public function nilaiSemester()
    {
        return $this->hasMany(Nilai::class, 'mahasiswa_id', 'mahasiswa_id')
            ->where('taka_id', $this->taka_id)
            ->where('semester', $this->semester)
            ->published();
    }

    // SCOPE METHODS
    public function scopeByMahasiswa($query, $mahasiswaId)
    {
        return $query->where('mahasiswa_id', $mahasiswaId);
    }

    public function scopeBySemester($query, $semester)
    {
        return $query->where('semester', $semester);
    }

    public function scopeByTahunAkademik($query, $takaId)
    {
        return $query->where('taka_id', $takaId);
    }

    public function scopePublished($query)
    {
        return $query->where('status_generate', 'Published');
    }

    public function scopeByStatusAkademik($query, $status)
    {
        return $query->where('status_akademik', $status);
    }

    // BUSINESS LOGIC METHODS
    public function generateKHS()
    {
        // Ambil semua nilai semester ini
        $nilaiSemester = Nilai::byMahasiswa($this->mahasiswa_id)
            ->byTahunAkademik($this->taka_id)
            ->bySemester($this->semester)
            ->published()
            ->get();

        // Hitung statistik semester
        $this->total_sks_tempuh = $nilaiSemester->sum('sks');
        $this->total_sks_lulus = $nilaiSemester->where('nilai_mutu', '>=', 2.00)->sum('sks');
        $this->total_mutu = $nilaiSemester->sum('mutu_x_sks');
        $this->ips = $this->total_sks_tempuh > 0 ?
            round($this->total_mutu / $this->total_sks_tempuh, 2) : 0.00;

        // Hitung statistik kumulatif
        $this->hitungIPKKumulatif();

        // Tentukan status akademik
        $this->tentukanStatusAkademik();

        // Tentukan prediksi kelulusan
        $this->tentukanPrediksiKelulusan();

        // Hitung ranking
        $this->hitungRanking();

        $this->save();

        return $this;
    }

    private function hitungIPKKumulatif()
    {
        // Ambil semua nilai dari semester 1 hingga semester saat ini
        $semuaNilai = Nilai::byMahasiswa($this->mahasiswa_id)
            ->where('semester', '<=', $this->semester)
            ->published()
            ->get();

        $this->total_sks_kumulatif = $semuaNilai->where('nilai_mutu', '>=', 2.00)->sum('sks');
        $this->total_mutu_kumulatif = $semuaNilai->sum('mutu_x_sks');
        $this->ipk = $this->total_sks_kumulatif > 0 ?
            round($this->total_mutu_kumulatif / $semuaNilai->sum('sks'), 2) : 0.00;
    }

    private function tentukanStatusAkademik()
    {
        // Logika penentuan status akademik berdasarkan IPK dan aturan akademik
        if ($this->ipk >= 2.00) {
            $this->status_akademik = 'Aktif';
        } elseif ($this->ipk >= 1.50) {
            $this->status_akademik = 'Aktif'; // Dengan peringatan
        } else {
            // Cek berapa semester berturut-turut IPK < 1.50
            $semesterBuruk = KHS::byMahasiswa($this->mahasiswa_id)
                ->where('semester', '<=', $this->semester)
                ->where('ips', '<', 1.50)
                ->orderBy('semester', 'desc')
                ->count();

            if ($semesterBuruk >= 2) {
                $this->status_akademik = 'DO'; // Drop Out
            } else {
                $this->status_akademik = 'Aktif';
            }
        }
    }

    private function tentukanPrediksiKelulusan()
    {
        $semesterSaatIni = $this->semester;
        $targetLulus = 8; // Target lulus 8 semester

        if ($semesterSaatIni <= $targetLulus && $this->ipk >= 2.75) {
            $this->prediksi_kelulusan = 'Tepat Waktu';
        } elseif ($semesterSaatIni <= $targetLulus + 2 && $this->ipk >= 2.00) {
            $this->prediksi_kelulusan = 'Terlambat';
        } elseif ($this->ipk < 2.00) {
            $this->prediksi_kelulusan = 'Berisiko DO';
        } else {
            $this->prediksi_kelulusan = 'Tidak Terprediksi';
        }
    }

    private function hitungRanking()
    {
        // Ranking semester
        $rankingSemester = KHS::byTahunAkademik($this->taka_id)
            ->bySemester($this->semester)
            ->where('ips', '>', $this->ips)
            ->count() + 1;
        $this->ranking_semester = $rankingSemester;

        // Ranking angkatan (berdasarkan IPK)
        $mahasiswa = $this->mahasiswa;
        $rankingAngkatan = KHS::whereHas('mahasiswa', function($query) use ($mahasiswa) {
                $query->where('taka_regist', $mahasiswa->taka_regist);
            })
            ->where('semester', $this->semester)
            ->where('ipk', '>', $this->ipk)
            ->count() + 1;
        $this->ranking_angkatan = $rankingAngkatan;

        // Ranking program studi
        $rankingProdi = KHS::whereHas('mahasiswa', function($query) use ($mahasiswa) {
                $query->where('prodi_id', $mahasiswa->prodi_id);
            })
            ->where('semester', $this->semester)
            ->where('ipk', '>', $this->ipk)
            ->count() + 1;
        $this->ranking_prodi = $rankingProdi;
    }

    public function finalize()
    {
        $this->update(['status_generate' => 'Final']);
    }

    public function publish()
    {
        $this->update([
            'status_generate' => 'Published',
            'published_at' => now()
        ]);
    }

    public function lock()
    {
        $this->update(['is_locked' => true]);
    }

    public function unlock()
    {
        $this->update(['is_locked' => false]);
    }

    // STATIC METHODS
    public static function generateAllKHS($takaId, $semester)
    {
        // Generate KHS untuk semua mahasiswa aktif di semester tertentu
        $mahasiswaAktif = Mahasiswa::where('type', 1) // Mahasiswa Aktif
            ->where('semester', '>=', $semester)
            ->get();

        foreach ($mahasiswaAktif as $mahasiswa) {
            $khs = self::firstOrCreate([
                'mahasiswa_id' => $mahasiswa->id,
                'taka_id' => $takaId,
                'semester' => $semester
            ], [
                'code' => 'KHS-' . date('Ymd') . '-' . $mahasiswa->code . '-S' . $semester,
            ]);

            $khs->generateKHS();
        }
    }
}
