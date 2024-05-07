<!DOCTYPE html>
<html>
<head>
    <title>Daftar Hadir Perkuliahan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 700px;
            margin: 0 auto;
            padding: 1px;
            /* border: 1px solid #ddd; */
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            width: 125px;
            height: auto;
        }
        .title {
            font-size: 24px;
            margin-top: 10px;
        }
        .content {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 5px;
           
        }
        .empty {
            text-align: center;
        }
        .signature {
            margin-top: 10px;
            /* margin-bottom: 10px; */
            text-align: right;
        }
        .signature p {
            font-size: 16px;
            /* margin-top: 80px; */
        }
        .info {
            margin-bottom: 20px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .info-col {
            flex: 0 0 70%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header" style="text-align: center; margin-bottom: 20px;">
            <table style="width: 100%;">
                <tr>
                    <!-- Logo -->
                    <td style="width: 30%; text-align: center; border: none;">
                        <img src="{{ asset('storage') }}/images/website/site-logo.png" alt="Logo" class="logo" style="max-height: 125px; height: auto;">
                    </td>
                    <!-- Kop surat -->
                    <td style="width: 70%; text-align: center; border: none;">
                        <div>
                            <h2 class="title" style="margin: 0;">Universitas Contoh</h2>
                            <p style="margin: 5px 0; font-size: 16px;">Jl. Contoh No. 123, Kota Contoh</p>
                            <p style="margin: 5px 0; font-size: 16px;">Telp: (0123) 456789 | Fax: (0123) 456789</p>
                            <p style="margin: 5px 0; font-size: 16px;">Website: www.contoh.ac.id | Email: info@contoh.ac.id</p>
                        </div>
                    </td>
                </tr>
            </table>
            <hr style="margin-top: 20px; border: 1px solid #ddd;">
            <div class="header" style="text-align: center; margin-bottom: 20px;">
                <h2 class="title" style="margin-top: 20px; font-size: 20px;">
                    Daftar Hadir Perkuliahan <br>
                    {{ $jadkul->kelas->pstudi->fakultas->name }} <br>
                    Program Studi {{ $jadkul->kelas->pstudi->name }} <br>
                    {{ $jadkul->kelas->taka->name . ' - ' . $jadkul->kelas->taka->semester }}
                </h2>
            </div>
        </div>
        
        
        

        <table style="border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="text-align: left; border: none;">Mata Kuliah</td>
                    <td style="border: none;">:</td>
                    <td style="text-align: left; border: none;">{{ $jadkul->matkul->name }}</td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="text-align: left; border: none;">Hari</td>
                    <td style="border: none;">:</td>
                    <td style="text-align: left; border: none;">{{ $jadkul->days_id }}</td>
                </tr>
                <tr>
                    <td style="text-align: left; border: none;">Pertemuan</td>
                    <td style="border: none;">:</td>
                    <td style="text-align: left; border: none;">{{ $jadkul->pert_id }}</td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="text-align: left; border: none;">Tanggal</td>
                    <td style="border: none;">:</td>
                    <td style="text-align: left; border: none;">{{ \Carbon\Carbon::parse($jadkul->date)->format('d M Y') }}</td>
                </tr>
                <tr>
                    <td style="text-align: left; border: none;">Kelas</td>
                    <td style="border: none;">:</td>
                    <td style="text-align: left; border: none;">{{ $jadkul->kelas->name }}</td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="text-align: left; border: none;">Waktu</td>
                    <td style="border: none;">:</td>
                    <td style="text-align: left; border: none;">{{ \Carbon\Carbon::parse($jadkul->start)->format('H:i') . ' - ' . \Carbon\Carbon::parse($jadkul->ended)->format('H:i') }} WIB</td>
                </tr>
                <tr>
                    <td style="text-align: left; border: none;">Dosen Pengajar</td>
                    <td style="border: none;">:</td>
                    <td style="text-align: left; border: none;">{{ $jadkul->dosen->dsn_name }}</td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="text-align: left; border: none;">Ruangan</td>
                    <td style="border: none;">:</td>
                    <td style="text-align: left; border: none;">{{ $jadkul->ruang->name }}</td>
                </tr>
            </tbody>
        </table>
        
        
        

        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Waktu Absen</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($student as $key => $std)
                        <tr>
                            <td style="text-align: center">{{ ++$key }}</td>
                            <td style="text-align: center">{{ $std->mhs_nim }}</td>
                            <td>{{ $std->mhs_name }}</td>
                            <td style="text-align: center">{{ $std->kelas->name }}</td>
                            <td style="text-align: center">
                                @php
                                    $absent = $absen->where('author_id', $std->id)->first();
                                @endphp
                                @if ($absent)
                                    {{ $absent->absen_type }}
                                @else
                                    Tidak Hadir
                                @endif
                            </td>
                            <td style="text-align: center">
                                @if ($absent)
                                    {{ \Carbon\Carbon::parse($absent->absen_time)->format('H:i') }} WIB
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">Tidak ada data mahasiswa dalam kelas ini</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="signature">
            <table style="width: 100%">
                <tr>
                    <td style="width: 33%; text-align: left; border: none;">

                        <p style="margin-top: 50px;">Cirebon, {{ \Carbon\Carbon::now()->format('d M Y') }}</p>
                        <p style="margin-top: 75px;"><b>{{ Auth::user()->name }}</b> <br>{{ Auth::user()->type }}</p>
                    </td>
                    <td style="width: 33%; text-align: left; border: none;">

                        <p style="margin-top: 50px;">Mengetahui,</p>
                        <p style="margin-top: 75px;"><b>{{ $jadkul->dosen->dsn_name }}</b> <br>Dosen Pengajar</p>
                    </td>
                    <td style="width: 33%; text-align: left; border: none;">

                        <p style="margin-top: 50px;">Mengesahkan,</p>
                        <p style="margin-top: 75px;"><b>{{ $jadkul->matkul->pstudi->head->dsn_name }}</b> <br>Kepala Program Studi</p>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</body>
</html>
