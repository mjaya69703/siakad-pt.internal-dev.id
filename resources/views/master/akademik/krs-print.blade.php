<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Rencana Studi - {{ $krs->mahasiswa->name }}</title>
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

        .courses-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            border: 1px solid #000;
        }

        .courses-table th,
        .courses-table td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
            font-size: 10pt;
        }

        .courses-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .courses-table .subject-name {
            text-align: left;
            padding-left: 8px;
        }

        .courses-table .schedule {
            text-align: left;
            padding-left: 8px;
            font-size: 9pt;
        }

        .summary-section {
            margin: 15px 0;
            border: 1px solid #000;
            padding: 10px;
        }

        .summary-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
            text-decoration: underline;
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
            width: 33.33%;
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

        .status-badge {
            display: inline-block;
            padding: 2px 8px;
            border: 1px solid #000;
            font-weight: bold;
            font-size: 9pt;
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
    @if ($krs->status == 'published')
        <div class="watermark">APPROVED</div>
    @elseif ($krs->status == 'locked')
        <div class="watermark">LOCKED</div>
    @else
        <div class="watermark">DRAFT</div>
    @endif

    <!-- Header -->
    <div class="header">
        <div class="university-name">UNIVERSITAS [NAMA UNIVERSITAS]</div>
        <div class="faculty-name">{{ $krs->mahasiswa->programStudi->fakultas->name ?? 'FAKULTAS [NAMA FAKULTAS]' }}</div>
        <div class="document-title">KARTU RENCANA STUDI (KRS)</div>
        <div style="font-size: 12pt; margin-top: 10px;">
            Semester {{ $krs->semester }} | {{ $krs->tahunAkademik->name }} - {{ $krs->tahunAkademik->semester }}
        </div>
    </div>

    <!-- Student Information -->
    <div class="student-info">
        <table>
            <tr>
                <td class="label">Nama Mahasiswa</td>
                <td class="colon">:</td>
                <td>{{ $krs->mahasiswa->name }}</td>
                <td class="label" style="padding-left: 50px;">Program Studi</td>
                <td class="colon">:</td>
                <td>{{ $krs->mahasiswa->programStudi->name ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">NIM</td>
                <td class="colon">:</td>
                <td>{{ $krs->mahasiswa->nim }}</td>
                <td class="label" style="padding-left: 50px;">Tahun Masuk</td>
                <td class="colon">:</td>
                <td>{{ $krs->mahasiswa->angkatan ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Semester</td>
                <td class="colon">:</td>
                <td>{{ $krs->semester }}</td>
                <td class="label" style="padding-left: 50px;">Dosen Wali</td>
                <td class="colon">:</td>
                <td>{{ $krs->dosenWali->name ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Status KRS</td>
                <td class="colon">:</td>
                <td>
                    <span class="status-badge">
                        @switch($krs->status)
                            @case('draft')
                                DRAFT
                                @break
                            @case('submitted')
                                DIAJUKAN
                                @break
                            @case('approved')
                                DISETUJUI
                                @break
                            @case('rejected')
                                DITOLAK
                                @break
                            @case('published')
                                DIPUBLISH
                                @break
                            @case('locked')
                                DIKUNCI
                                @break
                            @default
                                {{ strtoupper($krs->status) }}
                        @endswitch
                    </span>
                </td>
                <td class="label" style="padding-left: 50px;">Total SKS</td>
                <td class="colon">:</td>
                <td><strong>{{ $krs->total_sks }} SKS</strong></td>
            </tr>
        </table>
    </div>

    <!-- Courses Table -->
    <table class="courses-table">
        <thead>
            <tr>
                <th rowspan="2" style="width: 6%;">No</th>
                <th rowspan="2" style="width: 12%;">Kode MK</th>
                <th rowspan="2" style="width: 30%;">Mata Kuliah</th>
                <th rowspan="2" style="width: 6%;">SKS</th>
                <th rowspan="2" style="width: 10%;">Kelas</th>
                <th colspan="3" style="width: 25%;">Jadwal</th>
                <th rowspan="2" style="width: 11%;">Dosen</th>
            </tr>
            <tr>
                <th style="width: 8%;">Hari</th>
                <th style="width: 10%;">Waktu</th>
                <th style="width: 7%;">Ruang</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @forelse ($krs->details as $detail)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $detail->mataKuliah->code }}</td>
                    <td class="subject-name">{{ $detail->mataKuliah->name }}</td>
                    <td>{{ $detail->mataKuliah->sks }}</td>
                    <td>{{ $detail->kelas->name ?? '-' }}</td>
                    <td>{{ $detail->jadwalKuliah->hari ?? '-' }}</td>
                    <td>
                        @if ($detail->jadwalKuliah)
                            {{ $detail->jadwalKuliah->jam_mulai }}<br>
                            {{ $detail->jadwalKuliah->jam_selesai }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $detail->jadwalKuliah->ruang ?? '-' }}</td>
                    <td class="schedule">
                        @if ($detail->mataKuliah->dosen1)
                            {{ $detail->mataKuliah->dosen1->name }}
                        @endif
                        @if ($detail->mataKuliah->dosen2)
                            <br>{{ $detail->mataKuliah->dosen2->name }}
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center; font-style: italic;">Tidak ada mata kuliah yang dipilih</td>
                </tr>
            @endforelse
        </tbody>
        @if ($krs->details->count() > 0)
            <tfoot>
                <tr style="background-color: #f0f0f0;">
                    <td colspan="3" style="text-align: center; font-weight: bold;">TOTAL SKS</td>
                    <td style="font-weight: bold;">{{ $krs->total_sks }}</td>
                    <td colspan="5"></td>
                </tr>
            </tfoot>
        @endif
    </table>

    <!-- Summary Section -->
    <div class="summary-section">
        <div class="summary-title">RINGKASAN KRS</div>

        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 50%; padding: 10px; border: 1px solid #000;">
                    <strong>Informasi Akademik:</strong><br>
                    - Semester: {{ $krs->semester }}<br>
                    - Total Mata Kuliah: {{ $krs->details->count() }} mata kuliah<br>
                    - Total SKS: {{ $krs->total_sks }} SKS<br>
                    - Tahun Akademik: {{ $krs->tahunAkademik->name }} - {{ $krs->tahunAkademik->semester }}
                </td>
                <td style="width: 50%; padding: 10px; border: 1px solid #000;">
                    <strong>Batas SKS:</strong><br>
                    - Maksimal SKS Normal: 24 SKS<br>
                    - Maksimal SKS dengan IP ≥ 3.0: 24 SKS<br>
                    - Maksimal SKS dengan IP < 3.0: 20 SKS<br>
                    - Status:
                    @if ($krs->total_sks <= 20)
                        <span style="color: green;">✓ Normal</span>
                    @elseif ($krs->total_sks <= 24)
                        <span style="color: orange;">⚠ Perlu Persetujuan</span>
                    @else
                        <span style="color: red;">✗ Melebihi Batas</span>
                    @endif
                </td>
            </tr>
        </table>

        @if ($krs->catatan)
            <div style="margin-top: 10px; padding: 8px; border: 1px solid #000;">
                <strong>Catatan:</strong><br>
                {{ $krs->catatan }}
            </div>
        @endif

        @if ($krs->rejection_reason)
            <div style="margin-top: 10px; padding: 8px; border: 2px solid #ff0000; background-color: #ffeeee;">
                <strong style="color: #ff0000;">Alasan Penolakan:</strong><br>
                {{ $krs->rejection_reason }}
            </div>
        @endif
    </div>

    <!-- Important Notes -->
    <div style="margin-top: 15px; padding: 10px; border: 1px dashed #000;">
        <strong>CATATAN PENTING:</strong>
        <ol style="margin: 5px 0; padding-left: 20px; font-size: 9pt;">
            <li>KRS ini harus mendapat persetujuan dari Dosen Pembimbing Akademik</li>
            <li>Perubahan KRS hanya dapat dilakukan pada periode yang telah ditentukan</li>
            <li>Mahasiswa wajib mengikuti semua mata kuliah yang tercantum dalam KRS</li>
            <li>Pembatalan mata kuliah di luar ketentuan akan mendapat sanksi akademik</li>
            <li>KRS yang telah disetujui dan dikunci tidak dapat diubah</li>
        </ol>
    </div>

    <!-- Signature Section -->
    <div class="signature-section">
        <table class="signature-table">
            <tr>
                <td class="signature-cell">
                    <div class="signature-title">Mahasiswa</div>
                    <div class="signature-name">{{ $krs->mahasiswa->name }}</div>
                    <div class="signature-nip">NIM. {{ $krs->mahasiswa->nim }}</div>
                </td>
                <td class="signature-cell">
                    <div class="signature-title">Dosen Pembimbing Akademik</div>
                    <div class="signature-name">
                        {{ $krs->dosenWali->name ?? '[Nama Dosen PA]' }}
                    </div>
                    <div class="signature-nip">
                        @if ($krs->dosenWali)
                            NIDN. {{ $krs->dosenWali->nidn }}
                        @else
                            NIDN. [NIDN Dosen PA]
                        @endif
                    </div>
                    @if ($krs->approved_at)
                        <div style="font-size: 8pt; margin-top: 5px;">
                            Disetujui: {{ $krs->approved_at->format('d/m/Y H:i') }}
                        </div>
                    @endif
                </td>
                <td class="signature-cell">
                    <div class="signature-title">Ketua Program Studi</div>
                    <div class="signature-name">
                        {{ $kaprodi->name ?? '[Nama Ketua Prodi]' }}
                    </div>
                    <div class="signature-nip">
                        NIDN. {{ $kaprodi->nidn ?? '[NIDN Ketua Prodi]' }}
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Print Information -->
    <div class="print-info">
        Dicetak pada: {{ now()->format('d F Y H:i:s') }} |
        Status: {{ strtoupper($krs->status) }} |
        @if ($krs->approved_at)
            Disetujui: {{ $krs->approved_at->format('d F Y H:i:s') }}
        @else
            Belum Disetujui
        @endif
        @if ($krs->published_at)
            | Dipublish: {{ $krs->published_at->format('d F Y H:i:s') }}
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
