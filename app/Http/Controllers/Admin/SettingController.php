<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate(
            ['id' => 1],
            [
                'school_name' => 'Smk 73',
                'email'       => 'info@sekolah.sch.id',
                'phone'       => '081234567890',
                'address'     => 'Bekasi, Jawa Barat'
            ]
        );

        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        // Gunakan updateOrCreate untuk memastikan data dengan id 1 selalu di-update atau dibuat jika belum ada
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'school_name' => $request->school_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]
        );

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
