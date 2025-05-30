<?php

namespace App\Models\Akademik;
// USE SYSTEM
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// USE MODELS
class TahunAkademik extends Model
{
    use SoftDeletes;

    protected $table = 'tahun_akademiks';
    protected $guarded = [];
}
