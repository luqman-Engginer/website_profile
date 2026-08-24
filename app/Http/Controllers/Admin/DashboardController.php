<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb; // Pastikan model Ppdb diimport
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data statistik dari database
        $totalPpdb    = Ppdb::count();
        $pendingPpdb  = Ppdb::where('status', 'Menunggu')->count();
        $acceptedPpdb = Ppdb::where('status', 'Diterima')->count();
        $rejectedPpdb = Ppdb::where('status', 'Ditolak')->count();

        // Pastikan mengarah ke view 'admin.dashboard'
        return view('admin.dashboard', compact(
            'totalPpdb',
            'pendingPpdb',
            'acceptedPpdb',
            'rejectedPpdb'
        ));
    }
}
