<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Setting;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function about()
    {
        return view('public.about');
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->get();
        return view('public.gallery', compact('galleries'));
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
