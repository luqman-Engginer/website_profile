<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        $ppdbs = Ppdb::latest()->paginate(10);
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
}
