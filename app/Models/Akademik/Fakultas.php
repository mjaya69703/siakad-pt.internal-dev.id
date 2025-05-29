<?php

namespace App\Models\Akademik;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dosen;
class Fakultas extends Model
{
    use SoftDeletes;

    protected $table = 'fakultas';
    protected $guarded = [];

    public function dekan()
    {
        return $this->belongsTo(Dosen::class);
    }
}
