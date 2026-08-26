<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        $ppdbs = Ppdb::when($search, function ($query, $search) {
                return $query->where('nama_siswa', 'like', "%{$search}%")
                           ->orWhere('nisn', 'like', "%{$search}%")
                           ->orWhere('nama_orang_tua', 'like', "%{$search}%");
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.ppdb.index', compact('ppdbs'));
    }

    public function show($id)
    {
        $ppdb = Ppdb::findOrFail($id);
        return view('admin.ppdb.show', compact('ppdb'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diterima,Ditolak',
        ]);

        $ppdb = Ppdb::findOrFail($id);
        $ppdb->status = $request->status;
        $ppdb->save();

        return redirect()->route('admin.ppdb.show', $id)->with('success', 'Status pendaftaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ppdb = Ppdb::findOrFail($id);
        $ppdb->delete();

        return redirect()->route('admin.ppdb.index')->with('success', 'Data pendaftaran berhasil dihapus!');
    }

    // ==========================================
    // TAMBAHAN FITUR EKSPOR (EXCEL & PDF) DI SINI
    // ==========================================

   public function exportExcel()
{
    $filename = 'data-ppdb-' . date('Y-m-d') . '.xls';
    $ppdbs = Ppdb::all();

    $headers = [
        "Content-type"        => "application/vnd.ms-excel",
        "Content-Disposition" => "attachment; filename=$filename",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    ];

    $callback = function() use($ppdbs) {
        echo '<table border="1">';
        echo '<thead>';
        echo '<tr style="background-color: #d4edda; font-weight: bold;">';
        echo '<th>No</th>';
        echo '<th>Nama Siswa</th>';
        echo '<th>NISN</th>';
        echo '<th>Jurusan</th>';
        echo '<th>Jenis Kelamin</th>';
        echo '<th>Asal Sekolah</th>';
        echo '<th>Nama Orang Tua</th>';
        echo '<th>No WhatsApp</th>';
        echo '<th>Status</th>';
        echo '<th>Tanggal Daftar</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($ppdbs as $index => $item) {
            echo '<tr>';
            echo '<td>' . ($index + 1) . '</td>';
            echo '<td>' . ($item->nama_siswa ?? '-') . '</td>';
            // Menambahkan tanda tab agar Excel membaca NISN/No HP sebagai teks utuh
            echo '<td style="mso-number-format:\@;">' . ($item->nisn ?? '-') . '</td>';
            echo '<td>' . ($item->jurusan ?? '-') . '</td>';
            echo '<td>' . ($item->jenis_kelamin ?? '-') . '</td>';
            echo '<td>' . ($item->asal_sekolah ?? '-') . '</td>';
            echo '<td>' . ($item->nama_orang_tua ?? '-') . '</td>';
            echo '<td style="mso-number-format:\@;">' . ($item->no_whatsapp ?? '-') . '</td>';
            echo '<td>' . ($item->status ?? '-') . '</td>';
            echo '<td>' . ($item->created_at ? $item->created_at->format('d-m-Y') : '-') . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    };

    return response()->stream($callback, 200, $headers);
}

public function exportSinglePdf($id)
{
    $ppdb = Ppdb::findOrFail($id);
    $setting = \App\Models\Setting::first(); // Pastikan model & tabelnya sesuai

    return view('admin.ppdb.pdf-single', compact('ppdb', 'setting'));
}
}
