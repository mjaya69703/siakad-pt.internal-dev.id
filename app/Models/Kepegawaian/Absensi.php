<?php

namespace App\Models\Kepegawaian;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS

class Absensi extends Model
{
    use SoftDeletes, HasLogAktivitas;
    
    protected $table = 'absensis';
    protected $guarded = [];
}
