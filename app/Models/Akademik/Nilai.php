<?php

namespace App\Models\Akademik;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
use App\Models\Mahasiswa;
use App\Models\Akademik\MataKuliah;
use App\Models\Akademik\KrsDetail;
use App\Models\Akademik\TahunAkademik;

class Nilai extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'nilais';
    protected $guarded = [];

    protected $casts = [
        'tugas_1' => 'decimal:2',
        'tugas_2' => 'decimal:2',
        'tugas_3' => 'decimal:2',
        'quiz_1' => 'decimal:2',
        'quiz_2' => 'decimal:2',
        'uts' => 'decimal:2',
        'uas' => 'decimal:2',
        'praktikum' => 'decimal:2',
        'kehadiran' => 'decimal:2',
        'bobot_tugas' => 'decimal:2',
        'bobot_quiz' => 'decimal:2',
        'bobot_uts' => 'decimal:2',
        'bobot_uas' => 'decimal:2',
        'bobot_praktikum' => 'decimal:2',
        'bobot_kehadiran' => 'decimal:2',
        'nilai_angka' => 'decimal:2',
        'nilai_mutu' => 'decimal:2',
        'mutu_x_sks' => 'decimal:2',
        'nilai_remidi' => 'decimal:2',
        'published_at' => 'datetime',
    ];

    // NILAI CONVERSION CONSTANTS
    const NILAI_HURUF_MAP = [
        'A' => ['min' => 85, 'max' => 100, 'mutu' => 4.00],
        'A-' => ['min' => 80, 'max' => 84.99, 'mutu' => 3.67],
        'B+' => ['min' => 75, 'max' => 79.99, 'mutu' => 3.33],
        'B' => ['min' => 70, 'max' => 74.99, 'mutu' => 3.00],
        'B-' => ['min' => 65, 'max' => 69.99, 'mutu' => 2.67],
        'C+' => ['min' => 60, 'max' => 64.99, 'mutu' => 2.33],
        'C' => ['min' => 55, 'max' => 59.99, 'mutu' => 2.00],
        'C-' => ['min' => 50, 'max' => 54.99, 'mutu' => 1.67],
        'D+' => ['min' => 45, 'max' => 49.99, 'mutu' => 1.33],
        'D' => ['min' => 40, 'max' => 44.99, 'mutu' => 1.00],
        'E' => ['min' => 0, 'max' => 39.99, 'mutu' => 0.00],
    ];

    // ACCESSOR METHODS
    public function getStatusAttribute($value)
    {
        $statuses = [
            'Draft' => 'Draft',
            'Published' => 'Published',
            'Locked' => 'Locked'
        ];

        return $statuses[$value] ?? 'Unknown';
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'Draft' => 'badge bg-secondary',
            'Published' => 'badge bg-success',
            'Locked' => 'badge bg-warning'
        ];

        return $badges[$this->attributes['status']] ?? 'badge bg-secondary';
    }

    public function getIsEditableAttribute()
    {
        return $this->attributes['status'] === 'Draft';
    }

    public function getIsLulusAttribute()
    {
        return $this->nilai_mutu >= 2.00; // C adalah batas lulus
    }

    public function getRataTugasAttribute()
    {
        $tugas = collect([$this->tugas_1, $this->tugas_2, $this->tugas_3])
            ->filter(function($nilai) { return $nilai !== null; });

        return $tugas->isEmpty() ? 0 : $tugas->avg();
    }

    public function getRataQuizAttribute()
    {
        $quiz = collect([$this->quiz_1, $this->quiz_2])
            ->filter(function($nilai) { return $nilai !== null; });

        return $quiz->isEmpty() ? 0 : $quiz->avg();
    }

    // RELATIONSHIP METHODS
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'matkul_id');
    }

    public function krsDetail()
    {
        return $this->belongsTo(KrsDetail::class, 'krs_detail_id');
    }

    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_id');
    }

    // SCOPE METHODS
    public function scopeByMahasiswa($query, $mahasiswaId)
    {
        return $query->where('mahasiswa_id', $mahasiswaId);
    }

    public function scopeByMatakuliah($query, $matkulId)
    {
        return $query->where('matkul_id', $matkulId);
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
        return $query->where('status', 'Published');
    }

    public function scopeLulus($query)
    {
        return $query->where('nilai_mutu', '>=', 2.00);
    }

    // BUSINESS LOGIC METHODS
    public function hitungNilaiAkhir()
    {
        $nilaiAkhir = 0;

        // Hitung rata-rata tugas
        $rataTugas = $this->rata_tugas;
        $nilaiAkhir += ($rataTugas * $this->bobot_tugas / 100);

        // Hitung rata-rata quiz
        $rataQuiz = $this->rata_quiz;
        $nilaiAkhir += ($rataQuiz * $this->bobot_quiz / 100);

        // Tambah UTS
        if ($this->uts !== null) {
            $nilaiAkhir += ($this->uts * $this->bobot_uts / 100);
        }

        // Tambah UAS
        if ($this->uas !== null) {
            $nilaiAkhir += ($this->uas * $this->bobot_uas / 100);
        }

        // Tambah Praktikum
        if ($this->praktikum !== null) {
            $nilaiAkhir += ($this->praktikum * $this->bobot_praktikum / 100);
        }

        // Tambah Kehadiran
        if ($this->kehadiran !== null) {
            $nilaiAkhir += ($this->kehadiran * $this->bobot_kehadiran / 100);
        }

        // Update nilai angka
        $this->nilai_angka = round($nilaiAkhir, 2);

        // Update nilai huruf dan mutu
        $this->updateNilaiHurufDanMutu();

        // Update mutu x SKS
        $this->mutu_x_sks = $this->nilai_mutu * $this->sks;

        $this->save();

        return $this->nilai_angka;
    }

    private function updateNilaiHurufDanMutu()
    {
        foreach (self::NILAI_HURUF_MAP as $huruf => $range) {
            if ($this->nilai_angka >= $range['min'] && $this->nilai_angka <= $range['max']) {
                $this->nilai_huruf = $huruf;
                $this->nilai_mutu = $range['mutu'];
                break;
            }
        }
    }

    public function publish()
    {
        $this->update([
            'status' => 'Published',
            'published_at' => now()
        ]);
    }

    public function lock()
    {
        $this->update(['status' => 'Locked']);
    }

    public function unlock()
    {
        $this->update(['status' => 'Published']);
    }

    // EVENT METHODS
    protected static function booted()
    {
        static::saving(function ($nilai) {
            // Auto calculate final grade when saving
            if ($nilai->isDirty(['tugas_1', 'tugas_2', 'tugas_3', 'quiz_1', 'quiz_2', 'uts', 'uas', 'praktikum', 'kehadiran'])) {
                $nilai->hitungNilaiAkhir();
            }
        });
    }
}
