<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - {{ $ppdb->nama_siswa }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #333;
            margin: 0;
            padding: 30px;
        }
        .header {
            text-align: center;
            border-bottom: 3px double #333;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .header h2 {
            margin: 0;
            text-transform: uppercase;
            font-size: 18px;
        }
        .header p {
            margin: 5px 0 0;
            color: #555;
            font-size: 12px;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            background-color: #f4f4f4;
            padding: 6px 10px;
            margin-bottom: 15px;
            border-left: 4px solid #0d6efd;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table td {
            padding: 8px 5px;
            vertical-align: top;
        }
        .label {
            width: 30%;
            font-weight: bold;
            color: #444;
        }
        .separator {
            width: 2%;
        }
        .value {
            width: 68%;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            font-weight: bold;
            font-size: 11px;
            border-radius: 4px;
        }
        .badge-success { background-color: #d1e7dd; color: #0f5132; }
        .badge-danger { background-color: #f8d7da; color: #842029; }
        .badge-warning { background-color: #fff3cd; color: #664d03; }

        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 12px;
        }
        .sign-space {
            margin-top: 60px;
            font-weight: bold;
        }
    </style>
</head>
<body onload="window.print()">

    <div class="header">
    <h2>Bukti Pendaftaran Calon Siswa Baru (PPDB)</h2>
    <!-- Ubah bagian ini supaya manggil dari database, jangan diketik "Laravel" -->
    <p>{{ $setting->nama_sekolah ?? $setting->name ?? $setting->school_name }}</p>
</div>

    <div class="section-title">Informasi Pribadi Siswa</div>
    <table>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td class="separator">:</td>
            <td class="value"><strong>{{ $ppdb->nama_siswa ?? '-' }}</strong></td>
        </tr>
        <tr>
            <td class="label">NISN</td>
            <td class="separator">:</td>
            <td class="value">{{ $ppdb->nisn ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Jenis Kelamin</td>
            <td class="separator">:</td>
            <td class="value">{{ $ppdb->jenis_kelamin ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Jurusan Pilihan</td>
            <td class="separator">:</td>
            <td class="value"><strong>{{ $ppdb->jurusan ?? '-' }}</strong></td>
        </tr>
        <tr>
            <td class="label">Asal Sekolah</td>
            <td class="separator">:</td>
            <td class="value">{{ $ppdb->asal_sekolah ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Informasi Orang Tua & Kontak</div>
    <table>
        <tr>
            <td class="label">Nama Orang Tua / Wali</td>
            <td class="separator">:</td>
            <td class="value">{{ $ppdb->nama_orang_tua ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Nomor WhatsApp</td>
            <td class="separator">:</td>
            <td class="value">{{ $ppdb->no_whatsapp ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Status Pendaftaran</td>
            <td class="separator">:</td>
            <td class="value">
                @if($ppdb->status == 'Diterima')
                    <span class="badge badge-success">DITERIMA</span>
                @elseif($ppdb->status == 'Ditolak')
                    <span class="badge badge-danger">DITOLAK</span>
                @else
                    <span class="badge badge-warning">MENUNGGU VERIFIKASI</span>
                @endif
            </td>
        </tr>
        <tr>
            <td class="label">Tanggal Pengajuan</td>
            <td class="separator">:</td>
            <td class="value">{{ $ppdb->created_at ? $ppdb->created_at->format('d-m-Y H:i') : '-' }}</td>
        </tr>
    </table>

    <div class="footer">
        <p>Bekasi, {{ date('d F Y') }}</p>
        <p>Panitia PPDB</p>
        <div class="sign-space">( __________________ )</div>
    </div>

</body>
</html>
