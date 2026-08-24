<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Memproses otentikasi login pengguna.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->intended(route('user.dashboard'));
        }

        return back()->with('error', 'Email atau password yang Anda masukkan salah.')->withInput();
    }

    /**
     * Menampilkan form registrasi.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Memproses pendaftaran akun baru (Tanpa validasi konfirmasi password).
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role'     => 'nullable|in:user,admin',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role ?? 'user',
        ]);

        Auth::login($user);

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Registrasi Admin berhasil!');
        }

        return redirect()->route('user.dashboard')->with('success', 'Registrasi berhasil! Selamat datang di Portal PPDB.');
    }

    /**
     * Memproses logout pengguna.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
