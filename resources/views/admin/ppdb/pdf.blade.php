<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pendaftaran PPDB</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .header h2 {
            margin: 0;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0 0;
            color: #666;
            font-size: 11px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 11px;
        }
    </style>
</head>
<body onload="window.print()">

    <div class="header">
        <h2>Laporan Data Calon Siswa PPDB</h2>
        <p>Dicetak pada: {{ date('d-m-Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 5%;">No</th>
                <th>Nama Siswa</th>
                <th>NISN</th>
                <th>Jurusan</th>
                <th>Asal Sekolah</th>
                <th>Orang Tua</th>
                <th>No WhatsApp</th>
                <th class="text-center" style="width: 10%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ppdbs as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->nama_siswa ?? '-' }}</td>
                    <td>{{ $item->nisn ?? '-' }}</td>
                    <td>{{ $item->jurusan ?? '-' }}</td>
                    <td>{{ $item->asal_sekolah ?? '-' }}</td>
                    <td>{{ $item->nama_orang_tua ?? '-' }}</td>
                    <td>{{ $item->no_whatsapp ?? '-' }}</td>
                    <td class="text-center">{{ $item->status ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data pendaftaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Administrator PPDB</p>
    </div>

</body>
</html>
