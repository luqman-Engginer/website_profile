<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'school_name'  => 'required|string|max:255',
            'email'        => 'nullable|email',
            'phone'        => 'nullable|string',
            'address'      => 'nullable|string',
            'social_media' => 'nullable|string',
            'map_link'     => 'nullable|string',
            'school_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $setting = Setting::firstOrNew(['id' => 1]);

        $data = [
            'school_name'  => $request->school_name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'address'      => $request->address,
            'social_media' => $request->social_media,
            'map_link'     => $request->map_link,
        ];

        // Handle upload foto sekolah / profil sekolah
        if ($request->hasFile('school_photo')) {
            if ($setting->school_photo && Storage::disk('public')->exists($setting->school_photo)) {
                Storage::disk('public')->delete($setting->school_photo);
            }
            $data['school_photo'] = $request->file('school_photo')->store('settings', 'public');
        }

        Setting::updateOrCreate(['id' => 1], $data);

        return redirect()->back()->with('success', 'Pengaturan, sosial media, dan foto sekolah berhasil diperbarui!');
    }
}
