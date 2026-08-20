<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil data setting pertama, kalau belum ada buat baru secara otomatis
        $setting = Setting::firstOrCreate(
            ['id' => 1],
            [
                'school_name' => 'Nama Sekolah Default',
                'contact_number' => '081234567890',
                'location' => 'Lokasi sekolah belum diatur.'
            ]
        );

        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'location' => 'nullable|string',
        ]);

        $setting = Setting::first();
        $setting->update([
            'school_name' => $request->school_name,
            'contact_number' => $request->contact_number,
            'location' => $request->location,
        ]);

        return redirect()->back()->with('success', 'Pengaturan sekolah berhasil diperbarui!');
    }
}
