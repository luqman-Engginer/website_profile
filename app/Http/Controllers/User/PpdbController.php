<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        $ppdb = Ppdb::where('user_id', auth()->id())->first();

        return view('user.ppdb.index', compact('ppdb'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa'     => 'required|string|max:255',
            'nisn'           => 'required|numeric',
            'jurusan'        => 'required|string',
            'asal_sekolah'   => 'required|string|max:255',
            'nama_orang_tua' => 'required|string|max:255',
            'no_whatsapp'    => 'required|numeric',
        ]);

        Ppdb::create([
            'user_id'        => auth()->id(),
            'tahun_ajaran'   => '2026/2027',
            'nama_siswa'     => $validated['nama_siswa'],
            'nisn'           => $validated['nisn'],
            'jurusan'        => $validated['jurusan'],
            'asal_sekolah'   => $validated['asal_sekolah'],
            'nama_orang_tua' => $validated['nama_orang_tua'],
            'no_whatsapp'    => $validated['no_whatsapp'],
            'status'         => 'Menunggu',
        ]);

        return redirect()->route('user.ppdb')->with('success', 'Formulir pendaftaran berhasil dikirim!');
    }
}
