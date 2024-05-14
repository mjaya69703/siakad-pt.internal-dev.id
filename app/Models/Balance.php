<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getTypeAttribute($value)
    {
        $statuses = [
            0 => 'Balance Pending',
            1 => 'Balance Income',
            2 => 'Balance Expense',
        ];

        return isset($statuses[$value]) ? $statuses[$value] : null;
    }

    public function getRawTypeAttribute()
    {
        return $this->attributes['type'];
    }

    public function setValueAttribute($value)
    {
        // Hapus mutator ini jika Anda ingin menyimpan nilai tanpa menghapus format tambahan
        $this->attributes['value'] = str_replace(['Rp.', ' ', '.'], '', $value);
    }

    // Fungsi untuk mengembalikan nilai harga dalam format yang diinginkan
    public function getValueAttribute($value)
    {
        // Hapus aksesor ini jika Anda ingin mengakses nilai asli tanpa format tambahan
        return 'Rp. ' . number_format($value, 0, ',', '.');
    }
    public function getRawValueAttribute()
    {
        return $this->attributes['value'];
    }
}
