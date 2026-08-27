@extends('layouts.app')

@section('content')
<div class="container py-5 my-3">
    <!-- HERO SECTION UTAMA -->
    <div class="row align-items-center g-5 mb-5">
        <!-- Kolom Kiri: Teks Sambutan & Tombol Aksi -->
        <div class="col-lg-6 text-start">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold mb-3">
                <i class="fa-solid fa-graduation-cap me-1"></i> Portal Informasi & Layanan PPDB
            </span>
            <h1 class="display-4 fw-bold text-dark mb-3 lh-sm">
                Selamat Datang di Portal Resmi SMK
            </h1>
            <p class="text-muted fs-6 mb-4">
                Akses informasi sekolah, pendaftaran siswa baru, galeri kegiatan, serta layanan akademik secara praktis, cepat, dan transparan melalui panel ini.
            </p>
            <div class="d-flex flex-wrap gap-3">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-5 py-3 fw-bold shadow">
                            Dashboard Admin <i class="fa-solid fa-gauge ms-2"></i>
                        </a>
                    @else
                        <a href="{{ route('user.dashboard') }}" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-5 py-3 fw-bold shadow">
                            Dashboard Pendaftaran <i class="fa-solid fa-gauge ms-2"></i>
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-5 py-3 fw-bold shadow">
                        Masuk Akun <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-light border text-dark rounded-pill px-4 py-3 fw-semibold shadow-sm">
                        Daftar Sekarang
                    </a>
                @endauth
            </div>
        </div>

        <!-- Kolom Kanan: Card Visual Utama (Foto Persegi Panjang Penuh, Tanpa Teks) -->
        <div class="col-lg-6">
            <div class="card card-modern p-3 border-0 shadow-sm bg-white rounded-4 overflow-hidden">
                <!-- FOTO GEDUNG SEKOLAH DARI KAMI -->
                <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=800&q=80"
                     alt="Gedung Sekolah"
                     class="img-fluid rounded-3 w-100 object-fit-cover"
                     style="height: 260px; min-height: 260px;">
            </div>
        </div>
    </div>

    <!-- SECTION FITUR / KEUNGGULAN DI BAWAH -->
    <div class="row g-4 pt-4 border-top">
        <div class="col-md-4">
            <div class="card card-modern p-4 text-center h-100 border-0 shadow-sm bg-white rounded-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 55px; height: 55px;">
                    <i class="fa-solid fa-book-open fs-5"></i>
                </div>
                <h5 class="fw-bold text-dark mb-2">Kurikulum Unggulan</h5>
                <p class="text-muted small mb-0">Berfokus pada keahlian teknologi dan praktik industri masa depan.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-modern p-4 text-center h-100 border-0 shadow-sm bg-white rounded-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 55px; height: 55px;">
                    <i class="fa-solid fa-laptop-code fs-5"></i>
                </div>
                <h5 class="fw-bold text-dark mb-2">Fasilitas Modern</h5>
                <p class="text-muted small mb-0">Lab komputer dan perangkat pendukung belajar yang lengkap serta nyaman.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-modern p-4 text-center h-100 border-0 shadow-sm bg-white rounded-4">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 55px; height: 55px;">
                    <i class="fa-solid fa-chalkboard-user fs-5"></i>
                </div>
                <h5 class="fw-bold text-dark mb-2">Pengajar Profesional</h5>
                <p class="text-muted small mb-0">Dibimbing langsung oleh tenaga pendidik yang ahli di bidangnya.</p>
            </div>
        </div>
    </div>
</div>
@endsection
