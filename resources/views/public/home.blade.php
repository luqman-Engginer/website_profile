@extends('layouts.app')

@section('content')
<!-- HERO BANNER -->
<section class="py-5 text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);">
    <div class="container py-5 position-relative z-1">
        <div class="row align-items-center gy-4">
            <div class="col-lg-7">
                <span class="badge bg-primary bg-opacity-25 text-info px-3 py-2 rounded-pill mb-3 fw-semibold border border-info border-opacity-25">
                    <i class="fa-solid fa-sparkles me-1"></i> Selamat Datang
                </span>
                <h1 class="display-4 fw-bold mb-3 text-white tracking-tight">
                    {{ $globalSetting->school_name ?? 'Sekolah Unggulan' }}
                </h1>
                <p class="lead text-white-50 mb-4" style="max-width: 600px; line-height: 1.7;">
                    Mewujudkan generasi cerdas, berkarakter mulia, berwawasan global, serta siap menghadapi tantangan teknologi masa depan.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ url('/about') }}" class="btn btn-primary btn-lg rounded-pill px-4 fw-semibold shadow-sm border-0" style="background-color: #2563eb;">
                        Profil Sekolah <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                    <a href="{{ url('/gallery') }}" class="btn btn-outline-light btn-lg rounded-pill px-4 fw-semibold border-opacity-25">
                        <i class="fa-regular fa-images me-1.5"></i> Lihat Galeri
                    </a>
                </div>
            </div>

            <div class="col-lg-5 text-center d-none d-lg-block">
                <div class="p-4 rounded-4 bg-white bg-opacity-10 backdrop-blur border border-white border-opacity-10 shadow-lg">
                    <i class="fa-solid fa-graduation-cap text-info display-1 my-3"></i>
                    <h5 class="fw-bold text-white mb-1">Pendidikan Berbasis Masa Depan</h5>
                    <p class="text-white-50 small mb-0">Integritas, Inovasi, & Prestasi Akademik</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- HIGHLIGHT FITUR / KEUNGGULAN -->
<section class="py-5 bg-light">
    <div class="container py-2">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm border-0 h-100 hover-top">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 d-inline-flex mb-3">
                        <i class="fa-solid fa-laptop-code fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Fasilitas Modern</h5>
                    <p class="text-muted small mb-0">Dukungan laboratorium komputer berteknologi terkini dan ruang belajar interaktif.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm border-0 h-100 hover-top">
                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3 d-inline-flex mb-3">
                        <i class="fa-solid fa-user-graduate fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Pengajar Profesional</h5>
                    <p class="text-muted small mb-0">Tenaga pendidik tersertifikasi dan berdedikasi tinggi dalam mendampingi siswa.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm border-0 h-100 hover-top">
                    <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3 d-inline-flex mb-3">
                        <i class="fa-solid fa-trophy fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Ekstrakurikuler</h5>
                    <p class="text-muted small mb-0">Wadah pengembangan bakat siswa di bidang sains, olahraga, seni, dan kepemimpinan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TENTANG SEKOLAH & KONTAK RINGKAS -->
<section class="py-5 bg-white">
    <div class="container py-3">
        <div class="row align-items-center gy-4">
            <div class="col-lg-6">
                <span class="text-primary fw-bold text-uppercase small tracking-wider d-block mb-1">Sekilas Informasi</span>
                <h2 class="fw-bold text-dark mb-3">Tentang {{ $globalSetting->school_name ?? 'Sekolah Kami' }}</h2>
                <p class="text-secondary leading-relaxed mb-4">
                    Kami berkomitmen memberikan pendidikan berkualitas tinggi dengan memadukan kurikulum nasional dan pengembangan karakter siswa. Didukung oleh lingkungan belajar yang kondusif untuk menumbuhkan potensi terbaik setiap murid.
                </p>
                <a href="{{ url('/about') }}" class="fw-semibold text-primary text-decoration-none">
                    Pelajari Visi & Misi Selengkapnya <i class="fa-solid fa-chevron-right fs-7 ms-1"></i>
                </a>
            </div>
            <div class="col-lg-6">
                <div class="p-4 p-md-5 rounded-4 bg-light shadow-sm border">
                    <h5 class="fw-bold text-dark mb-4 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-address-book text-primary"></i> Layanan Informasi
                    </h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3 d-flex align-items-start gap-3">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <strong class="d-block text-dark small">Alamat Lengkap:</strong>
                                <span class="text-muted small">{{ $globalSetting->location ?? 'Lokasi sekolah belum diatur.' }}</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <strong class="d-block text-dark small">Telepon / WhatsApp:</strong>
                                <span class="text-muted small">{{ $globalSetting->contact_number ?? '-' }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hover-top { transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .hover-top:hover { transform: translateY(-4px); box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05) !important; }
</style>
@endsection
