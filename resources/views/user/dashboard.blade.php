@extends('layouts.user')

@section('content')
<div class="mb-5">
    <h3 class="fw-bold mb-1">Halo, {{ explode(' ', auth()->user()->name)[0] }}! 👋</h3>
    <p class="text-muted">Selamat datang di portal pendaftaran calon siswa baru.</p>
</div>

<div class="row g-4 mb-5">
    <div class="col-lg-8">
        <div class="card-modern p-4 p-md-5 bg-gradient-primary text-white position-relative overflow-hidden mb-4">
            <div class="position-relative z-1">
                <h3 class="fw-bold mb-2">Pendaftaran PPDB 2026/2027</h3>
                <p class="opacity-75 mb-4" style="max-width: 500px;">
                    Lengkapi formulir pendaftaran sekarang untuk menjadi bagian dari keluarga besar sekolah kami.
                </p>
                <a href="{{ route('user.ppdb') }}" class="btn btn-light text-primary fw-bold rounded-pill px-4 py-2 shadow-sm">
                    <i class="fa-solid fa-paper-plane me-2"></i> Isi Formulir PPDB
                </a>
            </div>
            <i class="fa-solid fa-graduation-cap position-absolute end-0 bottom-0 opacity-10" style="font-size: 15rem; margin-right: -30px; margin-bottom: -40px;"></i>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card-modern p-4 h-100">
            <h5 class="fw-bold mb-3">Informasi Akun</h5>
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="bg-light p-3 rounded-circle text-primary fw-bold">
                    <i class="fa-solid fa-envelope fs-5"></i>
                </div>
                <div>
                    <small class="text-muted d-block">Email Terdaftar</small>
                    <span class="fw-semibold text-dark">{{ auth()->user()->email }}</span>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="bg-light p-3 rounded-circle text-success fw-bold">
                    <i class="fa-solid fa-shield-halved fs-5"></i>
                </div>
                <div>
                    <small class="text-muted d-block">Status Akun</small>
                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">Aktif</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
