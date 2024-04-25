<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function head()
    {
        return $this->belongsTo(Dosen::class, 'head_id');
    }

}
