@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h2 class="fw-bold text-dark">Tentang Sekolah Kami</h2>
        <p class="text-muted">Mencetak generasi unggul di bidang teknologi informasi dan rekayasa lunak.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card-modern p-4 text-center h-100">
                <div class="bg-gradient-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa-solid fa-bullseye fs-4"></i>
                </div>
                <h5 class="fw-bold text-dark">Visi</h5>
                <p class="text-muted small">Menjadi pusat pendidikan kejuruan berstandar internasional yang menghasilkan lulusan berkompeten.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-modern p-4 text-center h-100">
                <div class="bg-gradient-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa-solid fa-rocket fs-4"></i>
                </div>
                <h5 class="fw-bold text-dark">Misi</h5>
                <p class="text-muted small">Menyelenggarakan kurikulum berbasis praktik industri dan membina karakter profesional peserta didik.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-modern p-4 text-center h-100">
                <div class="bg-gradient-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fa-solid fa-laptop-code fs-4"></i>
                </div>
                <h5 class="fw-bold text-dark">Keunggulan</h5>
                <p class="text-muted small">Fasilitas lab modern, pendampingan proyek nyata, dan jejaring mitra industri yang luas.</p>
            </div>
        </div>
    </div>
</div>
@endsection
