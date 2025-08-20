<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory, FeesStudent;

    protected $guarded = [];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    // Relationship with PMB Candidate
    public function pmbCandidate()
    {
        return $this->belongsTo(\App\Models\PMB\CalonMahasiswa::class, 'pmb_candidate_id');
    }
}
