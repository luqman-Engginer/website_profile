<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        // 1. Cek dulu apakah ada file yang dikirim
        if (!$request->hasFile('image')) {
            return back()->withInput()->withErrors(['image' => 'File gambar wajib dipilih.']);
        }

        $file = $request->file('image');

        // 2. Cek apakah file gagal terupload ke folder temporary PHP
        if (!$file->isValid()) {
            return back()->withInput()->withErrors([
                'image' => 'Gagal mengunggah file. Alasan: ' . $file->getErrorMessage()
            ]);
        }

        // 3. Validasi Form & File
        $request->validate([
            'title'       => 'required|string|max:255',
            'image'       => 'required|image|mimes:jpeg,png,jpg,webp|max:10240', // Maksimal 10MB
            'description' => 'nullable|string',
        ]);

        // 4. Simpan Gambar ke Storage
        $imagePath = $file->store('galleries', 'public');

        // 5. Simpan ke Database
        Gallery::create([
            'title'       => $request->title,
            'image'       => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'description' => 'nullable|string',
        ]);

        $data = [
            'title'       => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            if (!$file->isValid()) {
                return back()->withInput()->withErrors([
                    'image' => 'Gagal mengunggah gambar baru: ' . $file->getErrorMessage()
                ]);
            }

            // Hapus gambar lama jika ada
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            // Simpan gambar baru
            $data['image'] = $file->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
