<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Keuangan\TagihanKuliah;

class TripayTransaction extends Model
{
    use HasFactory;

    protected $table = 'tripay_transactions';

    protected $fillable = [
        'reference',
        'merchant_ref',
        'tagihan_kuliah_id',
        'payment_method',
        'payment_name',
        'amount',
        'fee_merchant',
        'fee_customer',
        'total_fee',
        'amount_received',
        'checkout_url',
        'status',
        'paid_at',
        'expired_time',
        'instructions',
        'qr_url',
        'callback_data'
    ];

    protected $casts = [
        'amount' => 'integer',
        'fee_merchant' => 'integer',
        'fee_customer' => 'integer',
        'total_fee' => 'integer',
        'amount_received' => 'integer',
        'paid_at' => 'datetime',
        'expired_time' => 'datetime',
        'instructions' => 'array',
        'callback_data' => 'array'
    ];

    /**
     * Relationship with TagihanKuliah
     */
    public function tagihanKuliah()
    {
        return $this->belongsTo(TagihanKuliah::class);
    }

    /**
     * Scope for filtering by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope for successful payments
     */
    public function scopePaid($query)
    {
        return $query->where('status', 'PAID');
    }

    /**
     * Scope for pending payments
     */
    public function scopePending($query)
    {
        return $query->where('status', 'UNPAID');
    }

    /**
     * Scope for failed payments
     */
    public function scopeFailed($query)
    {
        return $query->whereIn('status', ['FAILED', 'EXPIRED']);
    }

    /**
     * Check if transaction is paid
     */
    public function isPaid()
    {
        return $this->status === 'PAID';
    }

    /**
     * Check if transaction is pending
     */
    public function isPending()
    {
        return $this->status === 'UNPAID';
    }

    /**
     * Check if transaction is expired
     */
    public function isExpired()
    {
        return $this->status === 'EXPIRED' || 
               ($this->expired_time && now()->gt($this->expired_time));
    }

    /**
     * Get formatted amount
     */
    public function getFormattedAmountAttribute()
    {
        return 'Rp ' . number_format($this->amount, 0, ',', '.');
    }

    /**
     * Get formatted total amount (amount + fee)
     */
    public function getFormattedTotalAmountAttribute()
    {
        return 'Rp ' . number_format($this->amount + $this->total_fee, 0, ',', '.');
    }
}