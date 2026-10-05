<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Setting;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email atau password yang Anda masukkan salah.')->withInput();
        }

        // Login otomatis tanpa perlu input role manual di form
        Auth::login($user);
        $request->session()->regenerate();

        if ($user->role === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->intended(route('user.dashboard'));
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/'],
            'password' => 'required|string|min:6',
        ], [
            'email.regex' => 'Domain email wajib menggunakan @gmail.com!',
            'email.email' => 'Format email tidak valid.',
        ]);

        $confirmPassword = $request->input('password_confirmation') ?? $request->input('confirm_password');

        if ($request->password !== $confirmPassword) {
            return back()->withErrors([
                'password' => 'Konfirmasi password tidak cocok!'
            ])->withInput();
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('user.dashboard')->with('success', 'Registrasi berhasil! Selamat datang di Portal PPDB.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
