@extends('layouts.admin')

@section('content')
<div class="container py-3">
    <!-- HEADER DASHBOARD -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Dashboard Ringkasan Admin</h4>
            <p class="text-muted small mb-0">Selamat datang kembali, <strong>{{ auth()->user()->name }}</strong>. Berikut ringkasan sistem hari ini.</p>
        </div>
        <div>
            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill small">
                <i class="fa-solid fa-circle me-1 fs-6"></i> Sistem Aktif
            </span>
        </div>
    </div>

    <!-- METRIK STATISTIK (Disesuaikan jadi 3 Kolom) -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="p-3 bg-primary bg-opacity-10 text-primary rounded-3">
                        <i class="fa-solid fa-images fs-3"></i>
                    </div>
                    <div>
                        <span class="text-muted small d-block">Total Galeri Foto</span>
                        <h4 class="fw-bold text-dark mb-0">{{ \App\Models\Gallery::count() ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="p-3 bg-success bg-opacity-10 text-success rounded-3">
                        <i class="fa-solid fa-users fs-3"></i>
                    </div>
                    <div>
                        <span class="text-muted small d-block">Total Pengguna</span>
                        <h4 class="fw-bold text-dark mb-0">{{ \App\Models\User::count() ?? 1 }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="p-3 bg-info bg-opacity-10 text-info rounded-3">
                        <i class="fa-solid fa-gear fs-3"></i>
                    </div>
                    <div>
                        <span class="text-muted small d-block">Status Profil</span>
                        <h4 class="fw-bold text-dark mb-0" style="font-size: 1.1rem;">
                            {{ $globalSetting->school_name ? 'Tersetting' : 'Belum Set' }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- AKSI CEPAT ADMIN -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-bolt text-warning me-2"></i>Aksi Cepat Admin</h5>
                <div class="row g-3">

                    <!-- TOMBOL 1: TAMBAH GALERI (BIRU) -->
                    <div class="col-md-6">
                        <a href="{{ route('admin.galleries.create') }}"
                           class="w-100 p-3 rounded-3 text-start d-flex align-items-center justify-content-between text-decoration-none"
                           style="background-color: #eff6ff; border: 1.5px solid #bfdbfe;">
                            <div>
                                <strong class="d-block fw-bold" style="color: #1d4ed8;">Tambah Galeri Baru</strong>
                                <span class="small" style="color: #64748b;">Upload dokumentasi kegiatan sekolah</span>
                            </div>
                            <i class="fa-solid fa-plus fs-4" style="color: #1d4ed8;"></i>
                        </a>
                    </div>

                    <!-- TOMBOL 2: EDIT PROFIL -->
                    <div class="col-md-6">
                        <a href="{{ route('admin.settings.index') }}"
                           class="w-100 p-3 rounded-3 text-start d-flex align-items-center justify-content-between text-decoration-none"
                           style="background-color: #f0fdf4; border: 1.5px solid #bbf7d0;">
                            <div>
                                <strong class="d-block fw-bold" style="color: #15803d;">Edit Profil Sekolah</strong>
                                <span class="small" style="color: #64748b;">Ubah nama, kontak, & lokasi</span>
                            </div>
                            <i class="fa-solid fa-pen-to-square fs-4" style="color: #15803d;"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <!-- SIDEBAR INFORMASI ADMINISTRATOR -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4 mb-4">
                <h6 class="fw-bold text-dark mb-3">Informasi Administrator</h6>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-4" style="width: 50px; height: 50px;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <strong class="d-block text-dark">{{ auth()->user()->name }}</strong>
                        <span class="text-muted small">{{ auth()->user()->email }}</span>
                    </div>
                </div>
                <hr class="my-3 opacity-25">
                <div class="small">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Hak Akses:</span>
                        <span class="badge bg-primary">Administrator</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Versi App:</span>
                        <span class="fw-bold text-dark">v1.0.0 (Laravel)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
