<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Pendaftar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            padding: 0;
        }
        .header p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>{{ $webs->school_name }}</h2>
        <p>{{ $webs->school_apps }}</p>
        <p>Data Pendaftar</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No. Registrasi</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Jalur</th>
                <th>Gelombang</th>
                <th>Status</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftars as $pendaftar)
            <tr>
                <td>{{ $pendaftar->numb_reg }}</td>
                <td>{{ $pendaftar->name }}</td>
                <td>{{ $pendaftar->email }}</td>
                <td>{{ $pendaftar->phone }}</td>
                <td>{{ $pendaftar->jalur->name }}</td>
                <td>{{ $pendaftar->gelombang->name }}</td>
                <td>{{ $pendaftar->status }}</td>
                <td>{{ $pendaftar->register_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d F Y H:i:s') }}</p>
    </div>
</body>
</html> 