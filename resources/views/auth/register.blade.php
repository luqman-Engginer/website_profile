@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-10 col-xl-9">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="row g-0">

                    <!-- PANEL KIRI (ILUSTRASI) -->
                    <div class="col-md-5 d-none d-md-flex flex-column justify-content-between p-4 p-xl-5 text-white position-relative overflow-hidden"
                         style="background: linear-gradient(145deg, #0f172a 0%, #1e3a8a 100%);">

                        <div class="position-absolute end-0 bottom-0 text-white" style="opacity: 0.05; transform: translate(20%, 20%); pointer-events: none;">
                            <i class="fa-solid fa-user-plus" style="font-size: 16rem;"></i>
                        </div>

                        <div class="position-relative z-1 d-flex align-items-center gap-2">
                            <div class="bg-primary text-white rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="fa-solid fa-graduation-cap fs-5"></i>
                            </div>
                            <span class="fw-bold fs-5 tracking-tight text-white">{{ $schoolSettings['school_name'] ?? 'Portal Sekolah' }}</span>
                        </div>

                        <div class="position-relative z-1 my-4">
                            <span class="badge bg-primary bg-opacity-25 text-primary border border-primary border-opacity-25 rounded-pill px-3 py-2 mb-3 small fw-semibold">
                                <i class="fa-solid fa-sparkles me-1"></i> Registrasi Akun
                            </span>
                            <h2 class="fw-extrabold text-white mb-3" style="font-weight: 800; line-height: 1.2;">
                                Bergabung Bersama Kami!
                            </h2>
                            <p class="text-slate-300 small mb-0" style="color: #94a3b8; line-height: 1.6;">
                                Buat akun baru untuk mengakses portal informasi, galeri kegiatan, dan sistem pengelolaan sekolah.
                            </p>
                        </div>

                        <div class="position-relative z-1 pt-3 border-top border-secondary border-opacity-25 d-flex align-items-center gap-3">
                            <div class="bg-white bg-opacity-10 rounded-circle p-2 text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; min-width: 36px;">
                                <i class="fa-solid fa-shield-halved text-primary"></i>
                            </div>
                            <div class="small">
                                <div class="fw-semibold text-white" style="font-size: 13px;">Aman & Terproteksi</div>
                                <div style="color: #64748b; font-size: 11px;">Akses terisolasi sesuai hak role</div>
                            </div>
                        </div>
                    </div>

                    <!-- PANEL KANAN (FORM REGISTER) -->
                    <div class="col-md-7 p-4 p-lg-5 bg-white">
                        <div class="mb-4">
                            <h4 class="fw-bold text-dark mb-1">Buat Akun Baru</h4>
                            <p class="text-muted small mb-0">Lengkapi data pendaftaran akun Anda.</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Nama Lengkap -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-secondary">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted px-3"><i class="fa-regular fa-user"></i></span>
                                    <input type="text" name="name" class="form-control bg-light border-start-0 py-2 @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus placeholder="Masukkan nama lengkap">
                                </div>
                                @error('name')
                                    <span class="text-danger small mt-1 d-block"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-secondary">Alamat Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted px-3"><i class="fa-regular fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control bg-light border-start-0 py-2 @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="nama@email.com">
                                </div>
                                @error('email')
                                    <span class="text-danger small mt-1 d-block"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Pilihan Role (User / Admin) -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-secondary">Daftar Sebagai (Role)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted px-3"><i class="fa-solid fa-user-shield"></i></span>
                                    <select name="role" class="form-select bg-light border-start-0 py-2 @error('role') is-invalid @enderror" required>
                                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User biasa / Siswa</option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator / Pengelola</option>
                                    </select>
                                </div>
                                @error('role')
                                    <span class="text-danger small mt-1 d-block"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-secondary">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted px-3"><i class="fa-solid fa-lock"></i></span>
                                    <input type="password" name="password" class="form-control bg-light border-start-0 py-2 @error('password') is-invalid @enderror" required placeholder="Minimal 8 karakter">
                                </div>
                                @error('password')
                                    <span class="text-danger small mt-1 d-block"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold small text-secondary">Konfirmasi Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted px-3"><i class="fa-solid fa-shield"></i></span>
                                    <input type="password" name="password_confirmation" class="form-control bg-light border-start-0 py-2" required placeholder="Ulangi password">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 py-2.5 mb-3 fw-semibold rounded-3 shadow-sm">
                                Daftar Sekarang <i class="fa-solid fa-arrow-right-to-bracket ms-1"></i>
                            </button>

                            <div class="text-center">
                                <span class="small text-muted">Sudah punya akun? <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none ms-1">Masuk di sini</a></span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
