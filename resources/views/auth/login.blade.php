@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10 col-xl-9">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="row g-0">

                        <!-- PANEL KIRI -->
                        <div class="col-md-5 d-none d-md-flex flex-column justify-content-between p-4 p-xl-5 text-white position-relative overflow-hidden"
                            style="background: linear-gradient(145deg, #0f172a 0%, #1e3a8a 100%);">

                            <div class="position-absolute end-0 bottom-0 text-white opacity-10 pointer-events-none"
                                style="transform: translate(20%, 20%);">
                                <i class="fa-solid fa-right-to-bracket" style="font-size: 16rem;"></i>
                            </div>

                            <div class="position-relative z-1 d-flex align-items-center gap-2">
                                <div class="bg-primary text-white rounded-3 p-2 d-flex align-items-center justify-content-center"
                                    style="width: 38px; height: 38px;">
                                    <i class="fa-solid fa-graduation-cap fs-5"></i>
                                </div>
                                <span
                                    class="fw-bold fs-5 tracking-tight text-white">{{ $schoolSettings['school_name'] ?? 'Portal Sekolah' }}</span>
                            </div>

                            <div class="position-relative z-1 my-5">
                                <span
                                    class="badge bg-primary bg-opacity-25 text-info border border-info border-opacity-25 rounded-pill px-3 py-2 mb-3 small fw-semibold">
                                    <i class="fa-solid fa-lock me-1"></i> Area Masuk
                                </span>
                                <h2 class="fw-bold text-white mb-3" style="line-height: 1.2;">
                                    Selamat Datang Kembali!
                                </h2>
                                <p class="text-white-50 small mb-0" style="line-height: 1.6;">
                                    Silakan masuk dengan akun yang terdaftar untuk mengakses layanan portal sekolah.
                                </p>
                            </div>

                            <div
                                class="position-relative z-1 pt-4 border-top border-secondary border-opacity-25 d-flex align-items-center gap-3">
                                <div class="bg-white bg-opacity-10 rounded-circle p-2 text-white d-flex align-items-center justify-content-center"
                                    style="width: 36px; height: 36px;">
                                    <i class="fa-solid fa-shield-halved text-info"></i>
                                </div>
                                <div class="small">
                                    <div class="fw-semibold text-white">Sistem Autentikasi</div>
                                    <div class="text-white-50" style="font-size: 11px;">Enkripsi Keamanan Terjamin</div>
                                </div>
                            </div>
                        </div>

                        <!-- PANEL KANAN FORM -->
                        <div class="col-md-7 p-4 p-lg-5 bg-white">
                            <div class="mb-4">
                                <h4 class="fw-bold text-dark mb-1">Masuk ke Akun</h4>
                                <p class="text-muted small mb-0">Masukkan email dan kata sandi Anda.</p>
                            </div>

                            @if (session('status'))
                                <div
                                    class="alert alert-success border-0 bg-success-subtle text-success small py-2 px-3 mb-4 rounded-3">
                                    <i class="fa-solid fa-circle-check me-1"></i> {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold small text-secondary">Alamat Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0 text-muted px-3"><i
                                                class="fa-regular fa-envelope"></i></span>
                                        <input type="email" name="email"
                                            class="form-control bg-light border-start-0 py-2 @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" required autofocus placeholder="nama@email.com">
                                    </div>
                                    @error('email')
                                        <span class="text-danger small mt-1 d-block"><i
                                                class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Password with Show/Hide -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold small text-secondary">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0 text-muted px-3"><i
                                                class="fa-solid fa-lock"></i></span>
                                        <input type="password" name="password" id="loginPassword"
                                            class="form-control bg-light border-start-0 border-end-0 py-2 @error('password') is-invalid @enderror"
                                            required placeholder="••••••••">
                                        <button class="btn btn-light border-start-0 text-muted px-3" type="button"
                                            id="btnToggleLoginPass">
                                            <i class="fa-regular fa-eye" id="loginPassIcon"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <span class="text-danger small mt-1 d-block"><i
                                                class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Remember Me -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                        <label class="form-check-label small text-muted" for="remember">Ingat Saya</label>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="btn btn-primary w-100 py-2.5 mb-3 fw-semibold rounded-pill shadow-sm">
                                    Masuk Sekarang <i class="fa-solid fa-arrow-right-to-bracket ms-1"></i>
                                </button>

                                <div class="text-center">
                                    <span class="small text-muted">Belum punya akun? <a href="{{ route('register') }}"
                                            class="text-primary fw-bold text-decoration-none ms-1">Daftar Akun
                                            Baru</a></span>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('btnToggleLoginPass').addEventListener('click', function() {
            const input = document.getElementById('loginPassword');
            const icon = document.getElementById('loginPassIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
@endsection
