@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- HEADER SECTION -->
    <div class="text-center mx-auto mb-5" style="max-width: 700px;">
        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold mb-3">
            <i class="fa-solid fa-school me-1"></i> Profil Sekolah
        </span>
        <h2 class="fw-bold text-dark display-6">Tentang Sekolah Kami</h2>
        <p class="text-muted">Mencetak generasi unggul di bidang teknologi informasi dan rekayasa perangkat lunak yang siap menghadapi tantangan industri masa depan.</p>
    </div>

    <!-- SEJARAH / SAMBUTAN SINGKAT -->
    <div class="row align-items-center g-5 mb-5 py-3">
        <div class="col-lg-6">
            <h3 class="fw-bold text-dark mb-3">Membangun Fondasi Teknologi Sejak Dini</h3>
            <p class="text-muted leading-relaxed">
                Kami hadir sebagai wadah pendidikan kejuruan yang berfokus penuh pada bidang Rekayasa Perangkat Lunak. Dengan kurikulum yang disesuaikan dengan kebutuhan dunia industri modern, siswa dibimbing langsung oleh tenaga pengajar yang berpengalaman di bidangnya.
            </p>
            <p class="text-muted">
                Tidak hanya fokus pada teori koding, kami juga menanamkan logika pemrograman yang kuat, kerja tim lewat proyek nyata, serta etika profesional agar siap terjun ke dunia kerja maupun melanjutkan studi ke jenjang yang lebih tinggi.
            </p>
        </div>
        <div class="col-lg-6 text-center">
            <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm" alt="Tentang Kami">
        </div>
    </div>

    <!-- VISI, MISI, KEUNGGULAN -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card-modern p-4 text-center h-100 shadow-sm border-0 rounded-4">
                <div class="bg-gradient-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa-solid fa-bullseye fs-4"></i>
                </div>
                <h5 class="fw-bold text-dark">Visi</h5>
                <p class="text-muted small">Menjadi pusat pendidikan kejuruan berstandar internasional yang menghasilkan lulusan berkompeten dan berkarakter.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-modern p-4 text-center h-100 shadow-sm border-0 rounded-4">
                <div class="bg-gradient-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa-solid fa-rocket fs-4"></i>
                </div>
                <h5 class="fw-bold text-dark">Misi</h5>
                <p class="text-muted small">Menyelenggarakan kurikulum berbasis praktik industri, memperkuat soft-skills, dan membina profesionalisme peserta didik.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-modern p-4 text-center h-100 shadow-sm border-0 rounded-4">
                <div class="bg-gradient-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa-solid fa-laptop-code fs-4"></i>
                </div>
                <h5 class="fw-bold text-dark">Keunggulan</h5>
                <p class="text-muted small">Fasilitas lab modern, pendampingan proyek nyata (seperti web development), serta jejaring mitra industri yang luas.</p>
            </div>
        </div>
    </div>

    <!-- STATISTIK / INFO TAMBAHAN -->
    <div class="bg-light p-5 rounded-4 text-center">
        <div class="row g-4">
            <div class="col-md-4">
                <h3 class="fw-bold text-primary display-5">100%</h3>
                <p class="text-muted mb-0">Fokus Pembelajaran Praktik IT</p>
            </div>
            <div class="col-md-4">
                <h3 class="fw-bold text-primary display-5">Standard</h3>
                <p class="text-muted mb-0">Kurikulum Berbasis Industri</p>
            </div>
            <div class="col-md-4">
                <h3 class="fw-bold text-primary display-5">Aktif</h3>
                <p class="text-muted mb-0">Pengembangan Proyek Nyata</p>
            </div>
        </div>
    </div>
</div>
@endsection
