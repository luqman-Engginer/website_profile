@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row align-items-center g-5 py-5">
        <div class="col-lg-6">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold mb-3">
                <i class="fa-solid fa-sparkles me-1"></i> Penerimaan Siswa Baru 2026/2027
            </span>
            <h1 class="display-4 fw-bold text-dark mb-3">Masa Depan Cerah Dimulai Dari Sini.</h1>
            <p class="text-muted fs-5 mb-4">Bergabunglah bersama kami dan kembangkan keahlian teknologi & rekayasa perangkat lunak berskala industri.</p>
            <div class="d-flex gap-3">
                <a href="{{ route('register') }}" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-5 py-3 fw-bold shadow-lg">
                    Daftar Sekarang <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
                <a href="{{ route('about') }}" class="btn btn-light text-secondary rounded-pill px-4 py-3 fw-semibold">Pelajari Lebih Lanjut</a>
            </div>
        </div>
        <div class="col-lg-6 text-center">
            <img src="https://illustrations.popsy.co/amber/working-vacation.svg" class="img-fluid" width="500" alt="PPDB Hero">
        </div>
    </div>
</div>
@endsection
