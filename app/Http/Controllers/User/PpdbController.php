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

        // Mengarah ke file view: resources/views/user/ppdb.blade.php
        return view('user.ppdb', compact('ppdb'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa'     => 'required|string|max:255',
            'nisn'           => 'required|numeric|unique:ppdbs,nisn',
            'jenis_kelamin'  => 'required|string|in:Laki-laki,Perempuan',
            'jurusan'        => 'required|string',
            'asal_sekolah'   => 'required|string|max:255',
            'nama_ayah'      => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'nama_ibu'       => 'required|string|max:255',
            'pekerjaan_ibu'  => 'required|string|max:255',
            'no_whatsapp'    => 'required|numeric',
            'alamat'         => 'required|string',
        ]);

        Ppdb::create([
            'user_id'        => auth()->id(),
            'tahun_ajaran'   => '2026/2027',
            'nama_siswa'     => $validated['nama_siswa'],
            'nisn'           => $validated['nisn'],
            'jenis_kelamin'  => $validated['jenis_kelamin'],
            'jurusan'        => $validated['jurusan'],
            'asal_sekolah'   => $validated['asal_sekolah'],
            'nama_ayah'      => $validated['nama_ayah'],
            'pekerjaan_ayah' => $validated['pekerjaan_ayah'],
            'nama_ibu'       => $validated['nama_ibu'],
            'pekerjaan_ibu'  => $validated['pekerjaan_ibu'],
            'no_whatsapp'    => $validated['no_whatsapp'],
            'alamat'         => $validated['alamat'],
            'status'         => 'Menunggu',
        ]);

        return redirect()->route('user.ppdb')->with('success', 'Formulir pendaftaran berhasil dikirim!');
    }
}
