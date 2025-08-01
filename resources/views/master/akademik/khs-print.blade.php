<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Hasil Studi - {{ $khs->mahasiswa->name }}</title>
    <style>
        @page {
            size: A4;
            margin: 1cm;
        }

        body {
            font-family: 'Times New Roman', serif;
            font-size: 11pt;
            line-height: 1.2;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 15px;
        }

        .university-name {
            font-size: 16pt;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .faculty-name {
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .document-title {
            font-size: 14pt;
            font-weight: bold;
            margin-top: 15px;
            text-decoration: underline;
        }

        .student-info {
            margin: 20px 0;
        }

        .student-info table {
            width: 100%;
            border-collapse: collapse;
        }

        .student-info td {
            padding: 3px 0;
            vertical-align: top;
        }

        .student-info .label {
            width: 120px;
            font-weight: bold;
        }

        .student-info .colon {
            width: 10px;
            text-align: center;
        }

        .academic-summary {
            margin: 20px 0;
            border: 1px solid #000;
            padding: 10px;
        }

        .summary-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
            text-decoration: underline;
        }

        .grades-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            border: 1px solid #000;
        }

        .grades-table th,
        .grades-table td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
            font-size: 10pt;
        }

        .grades-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .grades-table .subject-name {
            text-align: left;
            padding-left: 8px;
        }

        .semester-summary {
            margin: 15px 0;
            border: 1px solid #000;
            padding: 10px;
        }

        .summary-grid {
            display: table;
            width: 100%;
        }

        .summary-row {
            display: table-row;
        }

        .summary-cell {
            display: table-cell;
            padding: 5px;
            border: 1px solid #000;
            text-align: center;
            font-weight: bold;
        }

        .signature-section {
            margin-top: 30px;
            width: 100%;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
        }

        .signature-cell {
            width: 50%;
            text-align: center;
            vertical-align: top;
            padding: 10px;
        }

        .signature-title {
            font-weight: bold;
            margin-bottom: 50px;
        }

        .signature-name {
            font-weight: bold;
            border-bottom: 1px solid #000;
            padding-bottom: 2px;
        }

        .signature-nip {
            font-size: 9pt;
            margin-top: 5px;
        }

        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 120pt;
            color: rgba(0, 0, 0, 0.05);
            z-index: -1;
            font-weight: bold;
        }

        .page-break {
            page-break-before: always;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .no-print {
                display: none !important;
            }
        }

        .print-info {
            margin-top: 20px;
            font-size: 8pt;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    @if ($khs->status_generate == 'Published')
        <div class="watermark">OFFICIAL</div>
    @else
        <div class="watermark">DRAFT</div>
    @endif

    <!-- Header -->
    <div class="header">
        <div class="university-name">UNIVERSITAS [NAMA UNIVERSITAS]</div>
        <div class="faculty-name">{{ $khs->mahasiswa->programStudi->fakultas->name ?? 'FAKULTAS [NAMA FAKULTAS]' }}</div>
        <div class="document-title">KARTU HASIL STUDI (KHS)</div>
        <div style="font-size: 12pt; margin-top: 10px;">
            Semester {{ $khs->semester }} | {{ $khs->tahunAkademik->name }} - {{ $khs->tahunAkademik->semester }}
        </div>
    </div>

    <!-- Student Information -->
    <div class="student-info">
        <table>
            <tr>
                <td class="label">Nama Mahasiswa</td>
                <td class="colon">:</td>
                <td>{{ $khs->mahasiswa->name }}</td>
                <td class="label" style="padding-left: 50px;">Program Studi</td>
                <td class="colon">:</td>
                <td>{{ $khs->mahasiswa->programStudi->name ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">NIM</td>
                <td class="colon">:</td>
                <td>{{ $khs->mahasiswa->nim }}</td>
                <td class="label" style="padding-left: 50px;">Tahun Masuk</td>
                <td class="colon">:</td>
                <td>{{ $khs->mahasiswa->angkatan ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Semester</td>
                <td class="colon">:</td>
                <td>{{ $khs->semester }}</td>
                <td class="label" style="padding-left: 50px;">Status</td>
                <td class="colon">:</td>
                <td>{{ $khs->status_akademik }}</td>
            </tr>
        </table>
    </div>

    <!-- Grades Table -->
    <table class="grades-table">
        <thead>
            <tr>
                <th rowspan="2" style="width: 8%;">No</th>
                <th rowspan="2" style="width: 12%;">Kode MK</th>
                <th rowspan="2" style="width: 35%;">Mata Kuliah</th>
                <th rowspan="2" style="width: 8%;">SKS</th>
                <th colspan="2" style="width: 15%;">Nilai</th>
                <th rowspan="2" style="width: 8%;">Mutu</th>
                <th rowspan="2" style="width: 14%;">Keterangan</th>
            </tr>
            <tr>
                <th style="width: 7%;">Angka</th>
                <th style="width: 8%;">Huruf</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @forelse ($nilai_semester as $nilai)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $nilai->mataKuliah->code }}</td>
                    <td class="subject-name">{{ $nilai->mataKuliah->name }}</td>
                    <td>{{ $nilai->mataKuliah->sks }}</td>
                    <td>{{ $nilai->nilai_angka ?? '-' }}</td>
                    <td>{{ $nilai->nilai_huruf ?? '-' }}</td>
                    <td>{{ number_format($nilai->grade_point * $nilai->mataKuliah->sks, 2) }}</td>
                    <td>
                        @if ($nilai->status_lulus == 'lulus')
                            LULUS
                        @elseif ($nilai->status_lulus == 'tidak_lulus')
                            TIDAK LULUS
                        @elseif ($nilai->status_lulus == 'mengulang')
                            MENGULANG
                        @else
                            {{ strtoupper($nilai->status_lulus) }}
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center; font-style: italic;">Tidak ada data nilai</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Academic Summary -->
    <div class="academic-summary">
        <div class="summary-title">RINGKASAN PRESTASI AKADEMIK</div>

        <div style="display: table; width: 100%; margin-top: 10px;">
            <!-- Semester Statistics -->
            <div style="display: table-row;">
                <div style="display: table-cell; width: 50%; padding: 5px;">
                    <strong>SEMESTER {{ $khs->semester }}:</strong>
                    <table style="width: 100%; margin-top: 5px; border-collapse: collapse;">
                        <tr>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>SKS Tempuh</strong></td>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>SKS Lulus</strong></td>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Total Mutu</strong></td>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>IPS</strong></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;">{{ $khs->total_sks_tempuh }}</td>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;">{{ $khs->total_sks_lulus }}</td>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;">{{ number_format($khs->total_mutu, 2) }}</td>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;">{{ number_format($khs->ips, 2) }}</td>
                        </tr>
                    </table>
                </div>

                <div style="display: table-cell; width: 50%; padding: 5px;">
                    <strong>KUMULATIF:</strong>
                    <table style="width: 100%; margin-top: 5px; border-collapse: collapse;">
                        <tr>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Total SKS</strong></td>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Total Mutu</strong></td>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>IPK</strong></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;">{{ $khs->total_sks_kumulatif }}</td>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;">{{ number_format($khs->total_mutu_kumulatif, 2) }}</td>
                            <td style="border: 1px solid #000; padding: 3px; text-align: center; font-weight: bold; font-size: 12pt;">{{ number_format($khs->ipk, 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        @if ($khs->ranking_semester || $khs->ranking_prodi || $khs->ranking_angkatan)
            <div style="margin-top: 15px;">
                <strong>PERINGKAT:</strong>
                <table style="width: 100%; margin-top: 5px; border-collapse: collapse;">
                    <tr>
                        @if ($khs->ranking_semester)
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Ranking Semester</strong></td>
                        @endif
                        @if ($khs->ranking_prodi)
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Ranking Prodi</strong></td>
                        @endif
                        @if ($khs->ranking_angkatan)
                            <td style="border: 1px solid #000; padding: 3px; text-align: center;"><strong>Ranking Angkatan</strong></td>
                        @endif
                    </tr>
                    <tr>
                        @if ($khs->ranking_semester)
                            <td style="border: 1px solid #000; padding: 3px; text-align: center; font-weight: bold;">{{ $khs->ranking_semester }}</td>
                        @endif
                        @if ($khs->ranking_prodi)
                            <td style="border: 1px solid #000; padding: 3px; text-align: center; font-weight: bold;">{{ $khs->ranking_prodi }}</td>
                        @endif
                        @if ($khs->ranking_angkatan)
                            <td style="border: 1px solid #000; padding: 3px; text-align: center; font-weight: bold;">{{ $khs->ranking_angkatan }}</td>
                        @endif
                    </tr>
                </table>
            </div>
        @endif
    </div>

    <!-- Additional Information -->
    @if ($khs->prestasi || $khs->catatan_akademik || $khs->rekomendasi)
        <div style="margin-top: 15px;">
            @if ($khs->prestasi)
                <div style="margin-bottom: 10px;">
                    <strong>PRESTASI:</strong><br>
                    {{ $khs->prestasi }}
                </div>
            @endif

            @if ($khs->catatan_akademik)
                <div style="margin-bottom: 10px;">
                    <strong>CATATAN AKADEMIK:</strong><br>
                    {{ $khs->catatan_akademik }}
                </div>
            @endif

            @if ($khs->rekomendasi)
                <div style="margin-bottom: 10px;">
                    <strong>REKOMENDASI:</strong><br>
                    {{ $khs->rekomendasi }}
                </div>
            @endif
        </div>
    @endif

    <!-- Signature Section -->
    <div class="signature-section">
        <table class="signature-table">
            <tr>
                <td class="signature-cell">
                    <div class="signature-title">Dosen Pembimbing Akademik</div>
                    <div class="signature-name">
                        {{ $dosen_pa->name ?? '[Nama Dosen PA]' }}
                    </div>
                    <div class="signature-nip">
                        NIP. {{ $dosen_pa->nip ?? '[NIP Dosen PA]' }}
                    </div>
                </td>
                <td class="signature-cell">
                    <div class="signature-title">Ketua Program Studi</div>
                    <div class="signature-name">
                        {{ $kaprodi->name ?? '[Nama Ketua Prodi]' }}
                    </div>
                    <div class="signature-nip">
                        NIP. {{ $kaprodi->nip ?? '[NIP Ketua Prodi]' }}
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Print Information -->
    <div class="print-info">
        Dicetak pada: {{ now()->format('d F Y H:i:s') }} |
        Status: {{ $khs->status_generate }} |
        @if ($khs->published_at)
            Dipublish: {{ $khs->published_at->format('d F Y H:i:s') }}
        @else
            Belum Dipublish
        @endif
    </div>

    <script>
        // Auto print when page loads
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 500);
        };
    </script>
</body>
</html>
