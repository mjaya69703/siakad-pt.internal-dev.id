<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PendaftarExport implements FromCollection, WithHeadings, WithMapping
{
    protected $pendaftars;

    public function __construct($pendaftars)
    {
        $this->pendaftars = $pendaftars;
    }

    public function collection()
    {
        return $this->pendaftars;
    }

    public function headings(): array
    {
        return [
            'No. Registrasi',
            'Nama',
            'Email',
            'No. Telepon',
            'Jalur',
            'Gelombang',
            'Status',
            'Tanggal Daftar'
        ];
    }

    public function map($pendaftar): array
    {
        return [
            $pendaftar->numb_reg,
            $pendaftar->name,
            $pendaftar->email,
            $pendaftar->phone,
            $pendaftar->jalur->name,
            $pendaftar->gelombang->name,
            $pendaftar->status,
            $pendaftar->register_date
        ];
    }
} 