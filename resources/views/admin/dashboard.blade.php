@extends('layouts.admin')

@section('content')
<!-- Banner Sapaan Atas -->
<div class="card-modern bg-gradient-primary p-4 p-md-5 mb-4 text-white position-relative overflow-hidden">
    <div style="position: relative; z-index: 2;">
        <span class="badge bg-white bg-opacity-25 px-3 py-1 rounded-pill mb-2 fw-semibold">Sistem PPDB Online</span>
        <h1 class="fw-bold mb-2">Selamat Datang, Admin! 👋</h1>
        <p class="mb-0 text-white text-opacity-75" style="max-width: 600px;">
            Pantau seluruh aktivitas pendaftaran calon siswa, kelola data pengguna, dan verifikasi status kelulusan secara real-time dari panel ini.
        </p>
    </div>
    <div class="position-absolute end-0 bottom-0 opacity-10 pe-4 pb-2" style="font-size: 8rem; line-height: 1;">
        <i class="fa-solid fa-graduation-cap"></i>
    </div>
</div>

<!-- Statistik Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card-modern p-4 d-flex flex-column justify-content-between h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted fw-bold text-uppercase small">Total Pendaftar</span>
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                    <i class="fa-solid fa-users fs-5"></i>
                </div>
            </div>
            <h2 class="fw-bold text-dark m-0">{{ $totalPpdb ?? 0 }}</h2>
            <small class="text-muted mt-2"><i class="fa-solid fa-arrow-trend-up text-success me-1"></i> Data masuk keseluruhan</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-modern p-4 d-flex flex-column justify-content-between h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-warning fw-bold text-uppercase small">Menunggu Verifikasi</span>
                <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                    <i class="fa-solid fa-clock-rotate-left fs-5"></i>
                </div>
            </div>
            <h2 class="fw-bold text-warning m-0">{{ $pendingPpdb ?? 0 }}</h2>
            <small class="text-muted mt-2">Perlu tindakan segera</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-modern p-4 d-flex flex-column justify-content-between h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-success fw-bold text-uppercase small">Diterima</span>
                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                    <i class="fa-solid fa-user-check fs-5"></i>
                </div>
            </div>
            <h2 class="fw-bold text-success m-0">{{ $acceptedPpdb ?? 0 }}</h2>
            <small class="text-muted mt-2">Siswa lolos seleksi</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-modern p-4 d-flex flex-column justify-content-between h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-danger fw-bold text-uppercase small">Ditolak</span>
                <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                    <i class="fa-solid fa-user-xmark fs-5"></i>
                </div>
            </div>
            <h2 class="fw-bold text-danger m-0">{{ $rejectedPpdb ?? 0 }}</h2>
            <small class="text-muted mt-2">Tidak memenuhi syarat</small>
        </div>
    </div>
</div>

<!-- Informasi Tambahan / Quick Action -->
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card-modern p-4 h-100">
            <h5 class="fw-bold text-dark mb-3">Aktivitas Sistem & Pintasan Cepat</h5>
            <p class="text-muted small mb-4">Gunakan pintasan di bawah untuk mengelola data operasional portal dengan cepat.</p>

            <div class="row g-3">
                <div class="col-md-6">
                    <a href="{{ route('admin.ppdb.index') }}" class="p-3 border rounded-3 d-flex align-items-center gap-3 text-decoration-none bg-light text-dark h-100">
                        <div class="bg-primary text-white rounded-3 p-3">
                            <i class="fa-solid fa-id-card fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Verifikasi PPDB</h6>
                            <small class="text-muted">Periksa formulir pendaftaran siswa baru.</small>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.users.index') }}" class="p-3 border rounded-3 d-flex align-items-center gap-3 text-decoration-none bg-light text-dark h-100">
                        <div class="bg-success text-white rounded-3 p-3">
                            <i class="fa-solid fa-users-gear fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Kelola Pengguna</h6>
                            <small class="text-muted">Atur hak akses admin dan siswa.</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card-modern p-4 h-100">
            <h5 class="fw-bold text-dark mb-3">Status Sistem</h5>
            <ul class="list-unstyled mb-0">
                <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span class="text-muted small">Versi Laravel</span>
                    <span class="fw-bold text-dark">13.24.0</span>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span class="text-muted small">Versi PHP</span>
                    <span class="fw-bold text-dark">8.5.8</span>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span class="text-muted small">Database Status</span>
                    <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill">Connected</span>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span class="text-muted small">Server Waktu</span>
                    <span class="fw-bold text-dark">{{ date('H:i') }} WIB</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
