<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Setting;

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

            // Direct dashboard berdasarkan role pengguna
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
     * Memproses pendaftaran akun baru.
     */
    public function register(Request $request)
    {
        // 1. Validasi dasar (Aturan 'confirmed' dilepas agar fleksibel)
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role'     => 'nullable|in:user,admin',
        ]);

        // 2. Cek manual nilai password vs konfirmasi password (kebal dari beda penamaan field Blade)
        $confirmPassword = $request->input('password_confirmation') ?? $request->input('confirm_password');

        if ($request->password !== $confirmPassword) {
            return back()->withErrors([
                'password' => 'Konfirmasi password tidak cocok!'
            ])->withInput();
        }

        // 3. Buat akun baru ke database dengan assign role
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role ?? 'user',
        ]);

        // Otomatis login setelah berhasil mendaftar
        Auth::login($user);

        // Redirect sesuai role yang baru terdaftar
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Registrasi akun Admin berhasil!');
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
