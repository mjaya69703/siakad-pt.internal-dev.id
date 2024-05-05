<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getTypeAttribute($value)
    {
        $types = [
            0 => 'Web Administrator', // => Prefix web-admin
            1 => 'Faculty Coordinator', // => Prefix faculty
            2 => 'Administrative Staff', // => Prefix administrative
            3 => 'Academic Staff', // => Prefix academic
            4 => 'Facility Staff', // => Prefix facility
        ];

        return isset($types[$value]) ? $types[$value] : 'Unknown';
    }

    public function getRawTypeAttribute()
    {
        return $this->attributes['type'];
    }

    public function getAgamaAttribute($value)
    {
        $relis = [
            0 => 'Belum Memilih',
            1 => 'Agama Islam',
            2 => 'Agama Kristen Katholik',
            3 => 'Agama Kristen Protestan',
            4 => 'Agama Hindu',
            5 => 'Agama Buddha',
            6 => 'Agama Konghuchu',
            7 => 'Kepercayaan Lainnya',
        ];

        return isset($relis[$value]) ? $relis[$value] : 'Unknown';
    }


    public function getRawReliAttribute()
    {
        return $this->attributes['reli'];
    }
}
