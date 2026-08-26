@extends('layouts.app')

@section('content')
<div class="container py-5 my-4">
    <!-- HERO SECTION -->
    <div class="row align-items-center py-4">
        <div class="col-lg-6 text-lg-start text-center mb-5 mb-lg-0">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-semibold mb-3 d-inline-block">
                Portal Informasi & Layanan
            </span>
            <h1 class="display-4 fw-bold mb-3" style="color: #2b3445;">Selamat Datang di Portal Resmi</h1>
            <p class="text-muted lead mb-4">
                Akses informasi sekolah, galeri kegiatan, serta layanan akademik pengguna secara praktis melalui panel ini.
            </p>
            <div class="d-flex justify-content-center justify-content-lg-start gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-4 py-3 fw-semibold shadow-sm">
                        Buka Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-4 py-3 fw-semibold shadow-sm">
                        Masuk Akun
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-light rounded-pill px-4 py-3 fw-semibold border shadow-sm">
                            Daftar Sekarang
                        </a>
                    @endif
                @endauth
            </div>
        </div>

        <!-- HERO IMAGE / ILLUSTRATION -->
        <div class="col-lg-6 text-center">
            <div class="p-3 bg-white card-modern shadow-sm border-0 p-4">
                @if(file_exists(public_path('ppdb-hero.png')))
                    <img src="{{ asset('ppdb-hero.png') }}" alt="PPDB Hero" class="img-fluid rounded-4 shadow-sm" style="max-height: 380px; width: 100%; object-fit: cover;">
                @else
                    <div class="p-5 bg-light rounded-4 text-secondary d-flex flex-column align-items-center justify-content-center" style="min-height: 300px;">
                        <i class="fa-solid fa-graduation-cap fa-4x mb-3 text-primary"></i>
                        <h5 class="fw-bold text-dark">Portal PPDB Online</h5>
                        <p class="text-muted small m-0">Wujudkan masa depan cemerlang bersama kami.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- FEATURE SECTION -->
    <div class="row mt-5 pt-4 g-4 text-center">
        <div class="col-md-4">
            <div class="card card-modern p-4 h-100 border-0 shadow-sm">
                <div class="bg-gradient-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm" style="width: 60px; height: 60px;">
                    <i class="fa-solid fa-book-open fs-4"></i>
                </div>
                <h5 class="fw-bold mb-2">Kurikulum Unggulan</h5>
                <p class="text-muted small m-0">Berfokus pada keahlian teknologi dan praktik industri masa depan.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-modern p-4 h-100 border-0 shadow-sm">
                <div class="bg-gradient-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm" style="width: 60px; height: 60px;">
                    <i class="fa-solid fa-laptop-code fs-4"></i>
                </div>
                <h5 class="fw-bold mb-2">Fasilitas Modern</h5>
                <p class="text-muted small m-0">Lab komputer dan perangkat pendukung belajar yang lengkap serta nyaman.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-modern p-4 h-100 border-0 shadow-sm">
                <div class="bg-gradient-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm" style="width: 60px; height: 60px;">
                    <i class="fa-solid fa-users-rectangle fs-4"></i>
                </div>
                <h5 class="fw-bold mb-2">Pengajar Profesional</h5>
                <p class="text-muted small m-0">Dibimbing langsung oleh tenaga pendidik yang ahli di bidangnya.</p>
            </div>
        </div>
    </div>
</div>
@endsection
