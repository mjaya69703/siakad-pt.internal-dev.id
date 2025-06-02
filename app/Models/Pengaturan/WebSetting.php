<?php

namespace App\Models\Pengaturan;
// USE SYSTEM
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasLogAktivitas;
// USE MODELS

class WebSetting extends Model
{
    use SoftDeletes, HasLogAktivitas;
    
    protected $table = 'web_settings';
    protected $guarded = [];

    public function getSchoolLogoHoriAttribute($value)
    {
        return $value == 'logo-hori.png' ? asset('storage/images/logo/logo-hori.png') : asset('storage/images/logo/' . $value);
    }
    public function getSchoolLogoVertAttribute($value)
    {
        return $value == 'logo-vert.png' ? asset('storage/images/logo/logo-vert.png') : asset('storage/images/logo/' . $value);
    }
}
