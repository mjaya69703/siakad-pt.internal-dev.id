<?php

namespace App\Models\Keuangan;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
// USE MODELS
use App\Models\Mahasiswa;
use App\Models\Akademik\TahunAkademik;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Kelas;
use App\Models\Keuangan\Biaya;
use App\Models\PMB\BiayaPendaftaran;
use App\Models\Keuangan\RiwayatPembayaran;

class TagihanKuliah extends Model
{
    use SoftDeletes, HasLogAktivitas;

    protected $table = 'tagihan_kuliahs';
    protected $guarded = [];

    /**
     * Billing types available
     */
    const BILLING_TYPES = [
        'SPP' => 'Sumbangan Pembinaan Pendidikan',
        'SKS' => 'Biaya per SKS',
        'UTS' => 'Ujian Tengah Semester',
        'UAS' => 'Ujian Akhir Semester',
        'WISUDA' => 'Biaya Wisuda',
        'KKN' => 'Kuliah Kerja Nyata',
        'PRAKTIKUM' => 'Biaya Praktikum',
        'IJAZAH' => 'Biaya Ijazah',
        'TRANSKRIP' => 'Biaya Transkrip Nilai',
        'SKPI' => 'Surat Keterangan Pendamping Ijazah',
        'DAFTAR_ULANG' => 'Daftar Ulang Semester',
        'KEMAHASISWAAN' => 'Biaya Kemahasiswaan',
        'PERPUSTAKAAN' => 'Biaya Perpustakaan',
        'LABORATORIUM' => 'Biaya Laboratorium',
        'SEMINAR_PROPOSAL' => 'Seminar Proposal',
        'SEMINAR_HASIL' => 'Seminar Hasil',
        'SIDANG_SKRIPSI' => 'Sidang Skripsi/Tugas Akhir',
        'REMEDIAL' => 'Biaya Ujian Remedial',
        'CUTI_AKADEMIK' => 'Biaya Cuti Akademik',
        'PINDAH_PRODI' => 'Biaya Pindah Program Studi',
        'PENGGANTIAN_KARTU' => 'Penggantian Kartu Mahasiswa',
        'LEGALISIR' => 'Biaya Legalisir Dokumen',
        'SURAT_KETERANGAN' => 'Surat Keterangan Mahasiswa',
        'REREGISTER' => 'Re-registrasi',
        'LAINNYA' => 'Biaya Lainnya'
    ];

    protected $casts = [
        'due_date' => 'date',
        'payment_deadline' => 'date',
        'paid_at' => 'datetime',
        'amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'penalty_amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'remaining_amount' => 'decimal:2',
        'is_mandatory' => 'boolean',
        'is_recurring' => 'boolean',
        'metadata' => 'array',
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

    // Relasi dengan Program Studi
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }

    // Relasi dengan Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Relasi dengan Riwayat Pembayaran
    public function riwayatPembayaran()
    {
        return $this->hasMany(RiwayatPembayaran::class, 'tagihan_kuliah_id');
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

    // Scope untuk filter berdasarkan tipe billing
    public function scopeByBillingType($query, $type)
    {
        return $query->where('billing_type', $type);
    }

    // Scope untuk tagihan wajib
    public function scopeMandatory($query)
    {
        return $query->where('is_mandatory', true);
    }

    // Scope untuk tagihan berulang
    public function scopeRecurring($query)
    {
        return $query->where('is_recurring', true);
    }

    // Scope untuk tagihan yang sudah jatuh tempo
    public function scopeOverdue($query)
    {
        return $query->where('due_date', '<', now())->where('status', 'Pending');
    }

    // Scope untuk tagihan semester tertentu
    public function scopeBySemester($query, $semester)
    {
        return $query->where('semester', $semester);
    }

    // Accessor untuk nama tipe billing
    public function getBillingTypeNameAttribute()
    {
        return self::BILLING_TYPES[$this->billing_type] ?? $this->billing_type;
    }

    // Accessor untuk status pembayaran
    public function getIsFullyPaidAttribute()
    {
        return $this->paid_amount >= $this->amount;
    }

    // Accessor untuk status overdue
    public function getIsOverdueAttribute()
    {
        return $this->due_date < now() && $this->status === 'Pending';
    }

    // Accessor untuk total amount (including penalty)
    public function getTotalAmountAttribute()
    {
        $total = $this->amount - $this->discount_amount + $this->penalty_amount;
        return max(0, $total); // Ensure non-negative
    }

    // Method untuk menghitung sisa pembayaran
    public function calculateRemainingAmount()
    {
        return max(0, $this->total_amount - $this->paid_amount);
    }

    // Method untuk update status pembayaran
    public function updatePaymentStatus()
    {
        $this->remaining_amount = $this->calculateRemainingAmount();
        
        if ($this->remaining_amount <= 0) {
            $this->status = 'Sukses';
            $this->paid_at = now();
        } elseif ($this->paid_amount > 0) {
            $this->status = 'Partial';
        }
        
        $this->save();
    }

    // Method untuk apply penalty jika overdue
    public function applyLatePenalty($penaltyRate = 0.02) // 2% default
    {
        if ($this->is_overdue && $this->penalty_amount == 0) {
            $this->penalty_amount = $this->amount * $penaltyRate;
            $this->save();
        }
    }

    // Method untuk apply discount
    public function applyDiscount($discountAmount)
    {
        $this->discount_amount = min($discountAmount, $this->amount);
        $this->save();
    }

    // Boot method untuk auto-calculate remaining amount
    protected static function boot()
    {
        parent::boot();
        
        static::saving(function ($model) {
            $model->remaining_amount = $model->calculateRemainingAmount();
        });
    }
}