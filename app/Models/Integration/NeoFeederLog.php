<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeoFeederLog extends Model
{
    use HasFactory;

    protected $table = 'neofeeder_logs';

    protected $fillable = [
        'operation',
        'data_type',
        'status',
        'message',
        'records_processed',
        'records_success',
        'records_failed',
        'details',
        'started_at',
        'completed_at'
    ];

    protected $casts = [
        'records_processed' => 'integer',
        'records_success' => 'integer',
        'records_failed' => 'integer',
        'details' => 'array',
        'started_at' => 'datetime',
        'completed_at' => 'datetime'
    ];

    /**
     * Scope for filtering by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope for filtering by data type
     */
    public function scopeByDataType($query, $dataType)
    {
        return $query->where('data_type', $dataType);
    }

    /**
     * Scope for recent logs
     */
    public function scopeRecent($query, $days = 7)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }
}