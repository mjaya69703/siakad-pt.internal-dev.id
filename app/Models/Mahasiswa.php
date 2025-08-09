<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HasLogAktivitas;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\Kelas;
use App\Models\Akademik\TahunAkademik;

class Mahasiswa extends Authenticatable
{
    use HasFactory, SoftDeletes, HasLogAktivitas;

    protected $table = 'mahasiswas';
    protected $guarded=[];

    public function getTypeAttribute($value)
    {
        $types = [
            0 => 'Calon Mahasiswa',               // => Prefix calon-mahasiswa
            1 => 'Mahasiswa Aktif',               // => Prefix mahasiswa
            2 => 'Mahasiswa Tidak Aktif',         // => Prefix mahasiswa-tidak-aktif
            3 => 'Mahasiswa Lulus',               // => Prefix mahasiswa-lulus
            4 => 'Mahasiswa Cuti',                // => Prefix mahasiswa-cuti
            5 => 'Mahasiswa Pindah',              // => Prefix mahasiswa-pindah
        ];

        return isset($types[$value]) ? $types[$value] : 'Unknown';
    }

    public function getPhotoAttribute($value)
    {
        return $value == 'default.jpg' ? asset('storage/images/profile/default.jpg') : asset('storage/images/profile/' . $value);
    }


    public function getRawTypeAttribute()
    {
        return $this->attributes['type'];
    }

    public function getWaPhoneAttribute()
    {
        if ($this->phone) {
            return preg_replace('/^0/', '62', $this->phone);
        }

        return null;
    }

    public function getPrefixAttribute()
    {
        $prefixes = [
            0 => 'calon-mahasiswa.',
            1 => 'mahasiswa.',
            2 => 'mahasiswa-tidak-aktif.',
            3 => 'mahasiswa-lulus.',
            4 => 'mahasiswa-cuti.',
            5 => 'mahasiswa-pindah.',
        ];

        // Jika type valid, kembalikan prefixnya, kalau tidak 'unknown'
        return isset($prefixes[$this->attributes['type']]) ? $prefixes[$this->attributes['type']] : 'unknown';
    }


    // WILL BE DELETED
    public function getAgamaAttribute($value)
    {
        $agamas = [
            0 => 'Belum Memilih',
            1 => 'Agama Islam',
            2 => 'Agama Kristen Katholik',
            3 => 'Agama Kristen Protestan',
            4 => 'Agama Hindu',
            5 => 'Agama Buddha',
            6 => 'Agama Konghuchu',
            7 => 'Kepercayaan Lainnya',
        ];

        return isset($agamas[$value]) ? $agamas[$value] : 'Unknown';
    }


    public function getRawAgamaAttribute()
    {
        return $this->attributes['agama'];
    }

    public function getPhoneAttribute($value)
    {
        // Periksa apakah nomor telepon dimulai dengan "0"
        if (strpos($value, '0') === 0) {
            // Jika ya, ubah menjadi "+62" dan hapus angka "0" di awal
            return '62' . substr($value, 1);
        }

        // Jika tidak dimulai dengan "0", biarkan seperti itu
        return $value;
    }

    // Relasi dengan Program Studi
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }

    // Relasi dengan Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id',);
    }

    // Relasi dengan Tahun Akademik Registrasi
    public function tahunAkademikRegistrasi()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_regist');
    }

    // Relasi dengan Tahun Akademik Aktif
    public function tahunAkademikAktif()
    {
        return $this->belongsTo(TahunAkademik::class, 'taka_active');
    }
}
