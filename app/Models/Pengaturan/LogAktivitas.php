<?php

namespace App\Models\Pengaturan;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasLogAktivitas;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogAktivitas extends Model
{
    use SoftDeletes, HasLogAktivitas, HasFactory;
    
    protected $table = 'log_aktivitas';
    
    protected $fillable = [
        'user_id',
        'user_type',
        'action',
        'model_type',
        'model_id',
        'changes',
        'ip_address',
        'user_agent',
        'description'
    ];

    protected $casts = [
        'changes' => 'array'
    ];

    // Relationship dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship dengan user yang membuat
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship dengan user yang mengupdate
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // Relationship dengan user yang menghapus
    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    // Relationship dengan detail perubahan
    public function changesDetails()
    {
        return $this->hasMany(ActivityLogChange::class, 'activity_log_id');
    }

    // Scope untuk filter berdasarkan tipe user
    public function scopeByUserType($query, $type)
    {
        return $query->where('user_type', $type);
    }

    // Scope untuk filter berdasarkan aksi
    public function scopeByAction($query, $action)
    {
        return $query->where('action', $action);
    }

    // Scope untuk filter berdasarkan model
    public function scopeByModel($query, $modelType)
    {
        return $query->where('model_type', $modelType);
    }

    // Scope untuk filter berdasarkan tanggal
    public function scopeByDate($query, $date)
    {
        return $query->whereDate('created_at', $date);
    }

    // Scope untuk filter berdasarkan range tanggal
    public function scopeByDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    // Accessor untuk mendapatkan perubahan dalam format yang lebih mudah dibaca
    public function getFormattedChangesAttribute()
    {
        $changes = $this->changes;
        $formatted = [];

        if ($this->action === 'update') {
            foreach ($changes['old'] as $key => $oldValue) {
                $formatted[] = [
                    'field' => $key,
                    'old' => $oldValue,
                    'new' => $changes['new'][$key] ?? null
                ];
            }
        } elseif ($this->action === 'create') {
            foreach ($changes['new'] as $key => $value) {
                $formatted[] = [
                    'field' => $key,
                    'new' => $value
                ];
            }
        } elseif ($this->action === 'delete') {
            foreach ($changes['old'] as $key => $value) {
                $formatted[] = [
                    'field' => $key,
                    'old' => $value
                ];
            }
        }

        return $formatted;
    }

    // Accessor untuk mendapatkan deskripsi aksi dalam bahasa Indonesia
    public function getActionDescriptionAttribute()
    {
        $descriptions = [
            'create' => 'Membuat',
            'update' => 'Mengubah',
            'delete' => 'Menghapus'
        ];

        return $descriptions[$this->action] ?? ucfirst($this->action);
    }

    // Accessor untuk mendapatkan tipe user dalam bahasa Indonesia
    public function getUserTypeDescriptionAttribute()
    {
        $types = [
            'user' => 'Administrator',
            'mahasiswa' => 'Mahasiswa',
            'dosen' => 'Dosen',
            'guest' => 'Tamu'
        ];

        return $types[$this->user_type] ?? ucfirst($this->user_type);
    }
}
