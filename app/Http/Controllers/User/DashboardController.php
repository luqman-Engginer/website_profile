<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Menampilkan Halaman Dashboard Utama
     */
    public function index()
    {
        $user = auth()->user();

        return view('user.dashboard', compact('user'));
    }

    /**
     * Menampilkan Halaman Profil User
     */
    public function profile()
    {
        $user = auth()->user();

        return view('user.profile', compact('user'));
    }

    /**
     * Memperbarui Profil User
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
