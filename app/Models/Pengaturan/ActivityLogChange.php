<?php

namespace App\Models\Pengaturan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLogChange extends Model
{
    use HasFactory;

    protected $table = 'activity_log_changes';

    protected $fillable = [
        'activity_log_id',
        'field_name',
        'old_value',
        'new_value',
    ];

    // Define the relationship back to the parent LogAktivitas
    public function logAktivitas()
    {
        return $this->belongsTo(LogAktivitas::class);
    }
}
