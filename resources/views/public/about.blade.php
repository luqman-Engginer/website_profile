@extends('layouts.app')

@section('content')
<!-- HERO HEADER -->
<section class="py-5 text-white text-center position-relative" style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);">
    <div class="container py-4">
        <span class="badge bg-primary bg-opacity-25 text-info px-3 py-2 rounded-pill mb-3 fw-semibold border border-info border-opacity-25">
            Tentang Kami
        </span>
        <h1 class="display-5 fw-bold text-white mb-2">Profil Sekolah</h1>
        <p class="lead text-white-50 mx-auto mb-0" style="max-width: 600px;">
            Mengenal lebih dekat visi, misi, dan komitmen kami dalam dunia pendidikan.
        </p>
    </div>
</section>

<!-- KONTEN UTAMA ABOUT -->
<section class="py-5 bg-white">
    <div class="container py-3">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <span class="text-primary fw-bold text-uppercase small tracking-wider d-block mb-1">Landasan Utama</span>
                <h3 class="fw-bold text-dark mb-3">Visi & Misi {{ $globalSetting->school_name ?? 'Sekolah' }}</h3>
                <p class="text-secondary leading-relaxed mb-4">
                    Kami berdedikasi untuk menciptakan lingkungan belajar yang inspiratif, aman, dan berteknologi tinggi untuk mencetak lulusan unggulan yang siap bersaing secara global.
                </p>

                <div class="p-4 bg-light rounded-4 border-start border-4 border-primary mb-4">
                    <h6 class="fw-bold text-dark mb-1"><i class="fa-solid fa-bullseye text-primary me-2"></i>Visi</h6>
                    <p class="text-muted small mb-0">Menjadi lembaga pendidikan terdepan dalam membentuk karakter mulia, keunggulan akademis, dan penguasaan teknologi.</p>
                </div>

                <div>
                    <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-list-check text-primary me-2"></i>Misi</h6>
                    <ul class="text-muted small ps-3 mb-0 d-flex flex-column gap-2">
                        <li>Menyelenggarakan pembelajaran berbasis teknologi terkini dan berstandar industri.</li>
                        <li>Mengembangkan potensi siswa secara holistik melalui kegiatan intrakurikuler & ekstrakurikuler.</li>
                        <li>Membangun kerja sama erat dengan orang tua, alumni, dan dunia usaha/dunia industri.</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="p-4 p-md-5 border-0 rounded-4 bg-slate-50 shadow-sm border" style="background-color: #f8fafc;">
                    <h5 class="fw-bold text-dark mb-4"><i class="fa-solid fa-building-columns text-primary me-2"></i>Fasilitas Unggulan</h5>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 bg-white rounded-3 border shadow-2xs h-100">
                                <i class="fa-solid fa-laptop-code text-primary fs-3 mb-2"></i>
                                <h6 class="fw-bold text-dark mb-1">Lab Komputer</h6>
                                <p class="text-muted small mb-0">Fasilitas komputer modern dengan koneksi internet cepat.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white rounded-3 border shadow-2xs h-100">
                                <i class="fa-solid fa-book-open text-primary fs-3 mb-2"></i>
                                <h6 class="fw-bold text-dark mb-1">Perpustakaan</h6>
                                <p class="text-muted small mb-0">Koleksi buku cetak & jurnal digital yang lengkap.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white rounded-3 border shadow-2xs h-100">
                                <i class="fa-solid fa-wifi text-primary fs-3 mb-2"></i>
                                <h6 class="fw-bold text-dark mb-1">Free Wi-Fi Area</h6>
                                <p class="text-muted small mb-0">Akses internet terdedikasi di seluruh area sekolah.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-white rounded-3 border shadow-2xs h-100">
                                <i class="fa-solid fa-volleyball text-primary fs-3 mb-2"></i>
                                <h6 class="fw-bold text-dark mb-1">Sarana Olahraga</h6>
                                <p class="text-muted small mb-0">Lapangan serbaguna untuk fleksibilitas aktivitas fisik.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
