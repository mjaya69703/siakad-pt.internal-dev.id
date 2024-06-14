<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentScore extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function task()
    {
        return $this->belongsTo(JadwalKuliah::class, 'stask_id',);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'student_id',);
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'author_id',);
    }


}
