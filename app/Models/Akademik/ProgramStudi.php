<?php

namespace App\Models\Akademik;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;
use App\Models\Akademik\Fakultas;
use App\Models\Dosen;

class ProgramStudi extends Model
{
    use SoftDeletes;

    protected $table = 'program_studis';
    protected $guarded = [];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
    public function kaprodi()
    {
        return $this->belongsTo(Dosen::class);
    }
}
