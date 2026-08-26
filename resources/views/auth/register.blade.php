@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card-modern p-4 p-md-5 bg-white shadow-sm rounded-4">
                <div class="text-center mb-4">
                    <h4 class="fw-bold text-dark">Daftar Akun Baru</h4>
                    <p class="text-muted small">Silakan isi data diri untuk mendaftar ke portal PPDB.</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger border-0 bg-danger text-white rounded-3 small py-2 mb-3">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label text-muted small fw-bold">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control rounded-3 py-2" value="{{ old('name') }}" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-muted small fw-bold">Alamat Email</label>
                        <input type="email" name="email" id="email" class="form-control rounded-3 py-2" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-muted small fw-bold">Password</label>
                        <input type="password" name="password" id="password" class="form-control rounded-3 py-2" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label text-muted small fw-bold">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-3 py-2" required>
                    </div>

                    <!-- Pilihan Role (Menyesuaikan controller aslimu) -->
                    <div class="mb-4">
                        <label for="role" class="form-label text-muted small fw-bold">Daftar Sebagai</label>
                        <select name="role" id="role" class="form-select rounded-3 py-2">
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User / Siswa Pendaftar</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-semibold shadow-sm mb-3" style="background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%); border: none;">
                        Daftar Sekarang
                    </button>

                    <div class="text-center">
                        <small class="text-muted">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-semibold" style="color: #4f46e5;">Masuk di sini</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
