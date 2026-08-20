<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $galleries = Gallery::latest()->take(6)->get();
        return view('public.home', compact('galleries'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('public.gallery', compact('galleries'));
    }

    public function contact()
    {
        return view('public.contact');
    }
}
