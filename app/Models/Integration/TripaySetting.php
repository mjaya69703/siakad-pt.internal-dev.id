<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripaySettings extends Model
{
    use HasFactory;

    protected $table = 'tripay_settings';

    protected $fillable = [
        'api_key',
        'private_key',
        'merchant_code',
        'is_production',
        'is_active',
        'webhook_url',
        'return_url',
        'auto_redirect'
    ];

    protected $casts = [
        'is_production' => 'boolean',
        'is_active' => 'boolean',
        'auto_redirect' => 'boolean'
    ];

    protected $hidden = [
        'private_key'
    ];

    /**
     * Get the base URL based on environment
     */
    public function getBaseUrlAttribute()
    {
        return $this->is_production 
            ? 'https://tripay.co.id/api' 
            : 'https://tripay.co.id/api-sandbox';
    }

    /**
     * Check if settings are configured
     */
    public function isConfigured()
    {
        return !empty($this->api_key) && 
               !empty($this->private_key) && 
               !empty($this->merchant_code);
    }
}