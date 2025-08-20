<?php

namespace App\Models\Akademik;

use Illuminate\Database\Eloquent\Model;

class JenjangPendidikan extends Model
{
    protected $table = 'jenjang_pendidikans';
    protected $fillable = ['nama', 'singkatan'];

    public function programStudis()
    {
        return $this->hasMany(ProgramStudi::class, 'jenjang_id');
    }
}
