<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\PendaftarResetPasswordNotification;

class PendaftarUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pendaftar_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status',
        'verification_token',
        'token_expires_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'token_expires_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PendaftarResetPasswordNotification($token));
    }

    public function pendaftaran()
    {
        return $this->hasOne(\App\Models\Pendaftaran\Pendaftar::class, 'pendaftar_user_id');
    }

    public function dokumenPMB()
    {
        return $this->hasManyThrough(
            \App\Models\Pendaftaran\DokumenPMB::class,
            \App\Models\Pendaftaran\Pendaftar::class,
            'pendaftar_user_id', // Foreign key on the pendaftars table
            'pendaftar_id',      // Foreign key on the dokumen_p_m_b_s table
            'id',                // Local key on the pendaftar_users table
            'id'                 // Local key on the pendaftars table
        );
    }
}
