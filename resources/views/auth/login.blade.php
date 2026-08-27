@extends('layouts.app')

@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card-modern p-4 p-md-5 w-100" style="max-width: 450px;">
        <div class="text-center mb-4">
            <h4 class="fw-bold text-dark">Selamat Datang</h4>
            <p class="text-muted small">Masuk ke akun portal PPDB Anda</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger border-0 rounded-3 py-2 px-3 small mb-3">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control rounded-3" placeholder="email@domain.com" value="{{ old('email') }}" required>
            </div>

            <!-- PILIHAN ROLE DI HALAMAN LOGIN -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Masuk Sebagai</label>
                <select name="role" class="form-select rounded-3" required>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User / Siswa Pendaftar</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control rounded-3" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn btn-primary bg-gradient-primary border-0 w-100 rounded-pill py-3 fw-bold shadow-sm">Masuk</button>
        </form>

        <div class="text-center mt-4">
            <small class="text-muted">Belum punya akun? <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none">Daftar</a></small>
        </div>
    </div>
</div>
@endsection
