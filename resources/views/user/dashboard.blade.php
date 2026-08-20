@extends('layouts.user')

@section('content')
<div class="container-fluid p-0 d-flex justify-content-center">
    <div style="width: 100%; max-width: 850px;">

        <!-- Header Welcome -->
        <div class="text-center mb-4">
            <h4 class="fw-bold text-dark mb-1">Dashboard Siswa</h4>
            <p class="text-muted small">Selamat datang kembali, <strong>{{ auth()->user()->name }}</strong>!</p>
        </div>

        <!-- Metric Quick Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
                            <i class="fa-solid fa-user-check fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small d-block">Status Akun</span>
                            <span class="fw-bold text-success">Aktif</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-info bg-opacity-10 text-info p-3 rounded-circle">
                            <i class="fa-solid fa-shield-halved fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small d-block">Role Pengguna</span>
                            <span class="fw-bold text-capitalize text-dark">{{ auth()->user()->role ?? 'User' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Informasi Sesi & Riwayat Login -->
        <div class="card border-0 shadow-sm rounded-4 bg-white mb-5">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h6 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock-rotate-left text-primary me-2"></i>Sesi Login Aktif</h6>
            </div>
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between p-3 bg-light rounded-3">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-laptop text-secondary fs-3"></i>
                        <div>
                            <span class="fw-semibold d-block text-dark">Browser / Perangkat Saat Ini</span>
                            <small class="text-muted">Terakhir aktif: {{ now()->format('d M Y, H:i') }} WIB</small>
                        </div>
                    </div>
                    <span class="badge bg-success rounded-pill px-3 py-2">Sesi Aktif</span>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
