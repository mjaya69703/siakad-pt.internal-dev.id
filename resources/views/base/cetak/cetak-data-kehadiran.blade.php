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
                    Data Kehadiran Mahasiswa<br>
                    {{ $kelas->pstudi->fakultas->name }} <br>
                    Program Studi {{ $kelas->pstudi->name }} <br>
                    {{ $kelas->taka->name . ' - ' . $kelas->taka->semester }}
                </h2>
            </div>
        </div>
        
        
        

        <table style="border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="text-align: left; border: none;">Nama Kelas</td>
                    <td style="border: none;">:</td>
                    <td style="text-align: left; border: none;">{{ $kelas->name }}</td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="text-align: left; border: none;">Wali Dosen</td>
                    <td style="border: none;">:</td>
                    <td style="text-align: left; border: none;">{{ $kelas->dosen->dsn_name }}</td>
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
                        <th>Gender</th>
                        <th>Kehadiran</th>
                        <th>Presentasi Kehadiran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswa as $key => $item)

                    <tr>
                        <td style="text-align: center" data-label="Number">{{ ++$key }}</td>
                        <td style="text-align: center" data-label="Nomor NIM">{{ $item->mhs_nim }}</td>
                        <td style="text-align: center" data-label="Nama Mahasiswa">{{ $item->mhs_name }}</td>
                        <td style="text-align: center" data-label="Jenis Kelamin">{{ $item->mhs_gend == null ? '-' : $item->mhs_gend }}</td>
                        @php  
                            $dateNow  = \Carbon\Carbon::now()->format('m-d-Y');
                            $timeNow  = \Carbon\Carbon::now()->format('H:i:s');

                            $jadkul = \App\Models\JadwalKuliah::where('kelas_id', $kelas->id)->get();
                            $absen = \App\Models\AbsensiMahasiswa::where('author_id', $item->id)->get();
                            // dd($absen->count());
                            
                        @endphp
                        <td style="text-align: center" data-label="Data Kehadiran">{{ $absen->count() }} / {{ $jadkul->count() }} Perkuliahan</td>
                        <td style="text-align: center" data-label="Presentase Kehadiran">{{ $absen->count() / $jadkul->count() * 100 }} %  </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="empty">Tidak ada data mahasiswa yang absen pada kelas ini</td>
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
                        <p style="margin-top: 75px;"><b>{{ $kelas->dosen->dsn_name }}</b> <br>Wali Dosen</p>
                    </td>
                    <td style="width: 33%; text-align: left; border: none;">

                        <p style="margin-top: 50px;">Mengesahkan,</p>
                        <p style="margin-top: 75px;"><b>{{ $kelas->pstudi->head->dsn_name }}</b> <br>Kepala Program Studi</p>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</body>
</html>
