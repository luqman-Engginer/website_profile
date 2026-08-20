<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    /**
     * Menampilkan Form Pendaftaran PPDB
     */
    public function index()
    {
        $user = auth()->user();

        return view('user.ppdb', compact('user'));
    }

    /**
     * Memproses dan Menyimpan Data Pendaftaran PPDB
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun_ajaran'   => 'required|string',
            'nama_siswa'     => 'required|string|max:255',
            'nisn'           => 'required|numeric|digits:10',
            'jurusan'        => 'required|string',
            'asal_sekolah'   => 'required|string|max:255',
            'nama_orang_tua' => 'required|string|max:255',
            'no_whatsapp'    => 'required|numeric',
        ]);

        Ppdb::create([
            'user_id'        => auth()->id(),
            'tahun_ajaran'   => $validated['tahun_ajaran'],
            'nama_siswa'     => $validated['nama_siswa'],
            'nisn'           => $validated['nisn'],
            'jurusan'        => $validated['jurusan'],
            'asal_sekolah'   => $validated['asal_sekolah'],
            'nama_orang_tua' => $validated['nama_orang_tua'],
            'no_whatsapp'    => $validated['no_whatsapp'],
            'status'         => 'Menunggu Verifikasi',
        ]);

        return back()->with('success', 'Formulir PPDB berhasil dikirim. Tim panitia akan segera menghubungi Anda.');
    }
}
