<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKuliah extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function taka()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_id');
    }
    public function pstudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'pstudi_id');
    }
}
