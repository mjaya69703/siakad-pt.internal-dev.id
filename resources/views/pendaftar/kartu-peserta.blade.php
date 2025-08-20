<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kartu Peserta PMB</title>
    <style>
        @page {
            margin: 20px;
            size: A4;
        }
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
            line-height: 1.4;
        }
        
        .header {
            text-align: center;
            border-bottom: 3px solid #0455A4;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        
        .logo {
            width: 80px;
            height: auto;
            margin-bottom: 10px;
        }
        
        .header h1 {
            margin: 0;
            color: #0455A4;
            font-size: 18px;
            font-weight: bold;
        }
        
        .header h2 {
            margin: 5px 0;
            color: #333;
            font-size: 16px;
        }
        
        .header p {
            margin: 0;
            color: #666;
            font-size: 11px;
        }
        
        .card-content {
            border: 2px solid #0455A4;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }
        
        .card-title {
            background: #0455A4;
            color: white;
            text-align: center;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
            font-size: 16px;
            font-weight: bold;
        }
        
        .info-row {
            display: flex;
            margin-bottom: 8px;
            align-items: center;
        }
        
        .info-label {
            width: 150px;
            font-weight: bold;
            color: #333;
        }
        
        .info-value {
            flex: 1;
            color: #555;
        }
        
        .photo-section {
            float: right;
            width: 120px;
            text-align: center;
            margin-left: 20px;
        }
        
        .photo-placeholder {
            width: 100px;
            height: 120px;
            border: 2px solid #ddd;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 10px;
            margin-bottom: 10px;
        }
        
        .barcode {
            text-align: center;
            margin: 20px 0;
            font-family: monospace;
            font-size: 14px;
            letter-spacing: 2px;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #666;
            font-size: 10px;
        }
        
        .instructions {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
        }
        
        .instructions h4 {
            margin-top: 0;
            color: #0455A4;
        }
        
        .instructions ul {
            margin: 10px 0;
            padding-left: 20px;
        }
        
        .instructions li {
            margin-bottom: 5px;
        }
        
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
        
        .status-badge {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }
        
        .status-pending { background: #fff3cd; color: #856404; }
        .status-verified { background: #d1ecf1; color: #0c5460; }
        .status-approved { background: #d4edda; color: #155724; }
        .status-rejected { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>KARTU PESERTA</h1>
        <h2>PENERIMAAN MAHASISWA BARU (PMB)</h2>
        <h2>BUKTI PENDAFTARAN</h2>
        <h2>TAHUN AKADEMIK {{ date('Y') }}/{{ date('Y') + 1 }}</h2>
        <p>Website: www.neco.ac.id | Email: info@neco.ac.id</p>
    </div>
    
    <!-- Main Card -->
    <div class="card-content">
        <div class="card-title">INFORMASI PESERTA</div>
        
        <div class="clearfix">
            <!-- Photo Section -->
            <div class="photo-section">
                @if($pasFoto)
                    <img src="{{ asset('storage/' . $pasFoto->file_path) }}" 
                         style="width: 100px; height: 120px; object-fit: cover; border: 2px solid #ddd;" 
                         alt="Pas Foto">
                @else
                    <div class="photo-placeholder">
                        FOTO 3x4
                    </div>
                @endif
                <div style="font-size: 10px; margin-top: 5px;">
                    @if($pasFoto)
                        Pas Foto<br>
                        Resmi
                    @else
                        Upload pas foto<br>
                        di dokumen
                    @endif
                </div>
            </div>
            
            <!-- Information Section -->
            <div style="margin-right: 140px;">
                <div class="info-row">
                    <div class="info-label">No. Pendaftaran</div>
                    <div class="info-value">: <strong>{{ $pendaftaran->numb_reg ?? $pendaftaran->code ?? 'PMB-' . date('Y') . '-' . str_pad($user->id, 6, '0', STR_PAD_LEFT) }}</strong></div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Nama Lengkap</div>
                    <div class="info-value">: {{ $pendaftaran->name ?? $user->name }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Tempat, Tgl Lahir</div>
                    <div class="info-value">: {{ $pendaftaran->tempat_lahir ?? '-' }}, {{ $pendaftaran->tanggal_lahir ? date('d F Y', strtotime($pendaftaran->tanggal_lahir)) : '-' }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Jenis Kelamin</div>
                    <div class="info-value">: {{ $pendaftaran->jenis_kelamin ?? '-' }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Email</div>
                    <div class="info-value">: {{ $user->email }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">No. HP</div>
                    <div class="info-value">: {{ $pendaftaran->phone ?? $user->phone }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Alamat</div>
                    <div class="info-value">: {{ $pendaftaran->alamat_lengkap ?? '-' }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Program Study Info -->
    <div class="card-content">
        <div class="card-title">PROGRAM STUDI PILIHAN</div>
        
        <div class="info-row">
            <div class="info-label">Jenjang Pendidikan</div>
            <div class="info-value">: {{ $pendaftaran->prodi1->jenjang->nama ?? '-' }}</div>
        </div>
        
        <div class="info-row">
            <div class="info-label">Program Studi</div>
            <div class="info-value">: {{ $pendaftaran->prodi1->name ?? '-' }}</div>
        </div>
        
        <div class="info-row">
            <div class="info-label">Kode Prodi</div>
            <div class="info-value">: {{ $pendaftaran->prodi1->code ?? '-' }}</div>
        </div>
        
        <div class="info-row">
            <div class="info-label">Tanggal Daftar</div>
            <div class="info-value">: {{ $pendaftaran->register_date ? date('d F Y', strtotime($pendaftaran->register_date)) : date('d F Y') }}</div>
        </div>
        
        <div class="info-row">
            <div class="info-label">Status Pendaftaran</div>
            <div class="info-value">: 
                <span class="status-badge status-{{ $pendaftaran->status ?? 'pending' }}">
                    {{ ucfirst($pendaftaran->status ?? 'Pending') }}
                </span>
            </div>
        </div>
    </div>
    
    <!-- Barcode/QR Section -->
    <div class="barcode">
        <div style="border: 1px solid #ccc; padding: 10px; display: inline-block;">
            <div style="font-size: 16px; font-weight: bold;">{{ $pendaftaran->numb_reg ?? $pendaftaran->code ?? 'PMB-' . date('Y') . '-' . str_pad($user->id, 6, '0', STR_PAD_LEFT) }}</div>
            <div style="font-size: 10px; color: #666;">Scan untuk verifikasi</div>
        </div>
    </div>
    
    <!-- Instructions -->
    <div class="instructions">
        <h4>PETUNJUK PENGGUNAAN KARTU PESERTA:</h4>
        <ul>
            <li>Kartu ini adalah bukti pendaftaran resmi PMB yang sah</li>
            <li>Simpan dan bawa kartu ini sebagai bukti registrasi pendaftaran</li>
            <li>Kartu menunjukkan status Anda sebagai calon mahasiswa terdaftar</li>
            <li>Kartu ini tidak dapat dipindahtangankan kepada orang lain</li>
            <li>Gunakan kartu ini untuk keperluan administrasi kampus</li>
            <li>Hubungi admin jika ada pertanyaan mengenai proses selanjutnya</li>
        </ul>
        
        <div style="margin-top: 15px;">
            <strong>Kontak Informasi:</strong><br>
            📞 Telepon: (021) 1234-5678<br>
            📱 WhatsApp: +62 821-1097-5474<br>
            📧 Email: pmb@neco.ac.id
        </div>
    </div>
    
    <!-- Footer -->
    <div class="footer">
        <p>Dicetak pada: {{ date('d F Y, H:i') }} WIB</p>
        <p>Dokumen ini digenerate secara otomatis oleh sistem PMB Neco Siakad</p>
    </div>
</body>
</html>
