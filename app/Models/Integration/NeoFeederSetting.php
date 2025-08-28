<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeoFeederSetting extends Model
{
    use HasFactory;

    protected $table = 'neofeeder_settings';

    protected $fillable = [
        'base_url',
        'username',
        'password',
        'is_active',
        'last_sync',
        'auto_sync_enabled',
        'sync_schedule'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'auto_sync_enabled' => 'boolean',
        'last_sync' => 'datetime'
    ];

    protected $hidden = [
        'password'
    ];
}