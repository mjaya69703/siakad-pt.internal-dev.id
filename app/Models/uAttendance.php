<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class uAttendance extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getAbsenTypeAttribute($value)
    {
        $statuses = [
            0 => 'Hadir - Regular',
            1 => 'Hadir - Lembur',
            2 => 'Izin - Sakit',
            3 => 'Izin - Berobat',
            4 => 'Hadir - Masuk Telat',
            5 => 'Hadir - Pulang Lebih Awal',
            6 => 'Izin - Keperluan Pribadi',
            7 => 'Izin - Cuti Tahunan',
        ];

        return isset($statuses[$value]) ? $statuses[$value] : null;
    }
    public function getAbsenApproveAttribute($value)
    {
        $statuses = [
            0 => 'Auto Approve',
            1 => 'Pending',
            2 => 'Approved',
            3 => 'Rejected',
        ];

        return isset($statuses[$value]) ? $statuses[$value] : null;
    }
    
    public function getDurasiKerja()
    {
        // Parse waktu absen dari atribut model
        $absen_time_in = Carbon::parse($this->absen_time_in);
        $absen_time_out = Carbon::parse($this->absen_time_out);

        // Menghitung selisih waktu
        $durasi = $absen_time_out->diff($absen_time_in);

        // Format durasi dalam jam dan menit
        return sprintf('%d Jam %02d Menit', $durasi->h, $durasi->i);
    }

    public function getRawAbsenTypeAttribute()
    {
        return $this->attributes['absen_type'];
    }

    public function getRawAbsenApproveAttribute()
    {
        return $this->attributes['absen_approve'];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'absen_user_id');
    }
}
