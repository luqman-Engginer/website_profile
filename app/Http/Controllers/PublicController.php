<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Setting;

class PublicController extends Controller
{
   public function home()
{
    return view('welcome');
}

    public function about()
    {
        $setting = Setting::first();
        return view('public.about', compact('setting'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->get();
        $setting = Setting::first(); // Boleh ditambahkan juga kalau galeri butuh data setting
        return view('public.gallery', compact('galleries', 'setting'));
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('public.contact', compact('setting'));
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        return redirect()->back()->with('success', 'Pesan Anda berhasil terkirim!');
    }
}
