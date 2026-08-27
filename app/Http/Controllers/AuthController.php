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
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
        'role'     => 'required|in:user,admin',
    ]);

    // 1. Cari user berdasarkan email terlebih dahulu (tanpa Auth::attempt langsung)
    $user = User::where('email', $request->email)->first();

    // Cek apakah email terdaftar dan passwordnya cocok
    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Email atau password yang Anda masukkan salah.')->withInput();
    }

    // 2. CEK ROLE: Jika yang dipilih di form beda dengan role asli di database, langsung tolak!
    if ($request->role === 'admin' && $user->role !== 'admin') {
        return back()->with('error', 'Akses ditolak! Akun Anda terdaftar sebagai User, bukan Administrator. Silakan ubah pilihan role Anda.')->withInput();
    }

    if ($request->role === 'user' && $user->role === 'admin') {
        return back()->with('error', 'Akses ditolak! Akun Administrator harus memilih role Administrator.')->withInput();
    }

    // 3. Jika semua cocok, baru login-kan user secara resmi
    Auth::login($user);
    $request->session()->regenerate();

    // Redirect sesuai role
    if ($user->role === 'admin') {
        return redirect()->intended(route('admin.dashboard'));
    }

    return redirect()->intended(route('user.dashboard'));
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
        // 1. Validasi input registrasi (Role sudah dihapus dari sini agar aman)
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/'],
            'password' => 'required|string|min:6',
        ], [
            'email.regex' => 'Domain email wajib menggunakan @gmail.com!',
            'email.email' => 'Format email tidak valid.',
        ]);

        // 2. Cek manual konfirmasi password
        $confirmPassword = $request->input('password_confirmation') ?? $request->input('confirm_password');

        if ($request->password !== $confirmPassword) {
            return back()->withErrors([
                'password' => 'Konfirmasi password tidak cocok!'
            ])->withInput();
        }

        // 3. Simpan data ke database dengan role otomatis 'user'
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user', // Otomatis diset sebagai user, aman dari pendaftaran admin ilegal
        ]);

        // Otomatis login setelah berhasil mendaftar
        Auth::login($user);

        // Karena pendaftar pasti user, langsung arahkan ke dashboard user
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
