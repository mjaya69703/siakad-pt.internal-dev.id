<?php

namespace App\Models\Kepegawaian;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
// USE MODELS

class Absensi extends Model
{
    use SoftDeletes;
    
    protected $table = 'absensis';
    protected $guarded = [];
}
