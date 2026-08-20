@extends('layouts.app')

@section('content')
<!-- HERO HEADER -->
<section class="py-5 text-white text-center" style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);">
    <div class="container py-4">
        <span class="badge bg-primary bg-opacity-25 text-info px-3 py-2 rounded-pill mb-3 fw-semibold border border-info border-opacity-25">
            Dokumentasi
        </span>
        <h1 class="display-5 fw-bold text-white mb-2">Galeri Kegiatan</h1>
        <p class="lead text-white-50 mx-auto mb-0" style="max-width: 600px;">
            Kumpulan momen dan aktivitas berharga para siswa serta staf sekolah.
        </p>
    </div>
</section>

<!-- KONTEN UTAMA GALLERY -->
<section class="py-5 bg-white">
    <div class="container py-3">
        @if(isset($galleries) && $galleries->count() > 0)
            <div class="row g-4">
                @foreach($galleries as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden transition-all hover-card">
                            <div class="position-relative overflow-hidden" style="height: 230px;">
                                <img src="{{ asset('storage/' . $item->image) }}" class="w-100 h-100 object-fit-cover transition-transform img-hover" alt="{{ $item->title }}">
                            </div>
                            <div class="card-body p-4">
                                <h6 class="fw-bold text-dark mb-2 fs-6">{{ $item->title }}</h6>
                                <p class="text-muted small mb-0" style="line-height: 1.6;">{{ Str::limit($item->description, 90) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <div class="bg-light rounded-circle p-4 d-inline-flex mb-3">
                    <i class="fa-regular fa-images text-muted fs-1"></i>
                </div>
                <h5 class="fw-bold text-dark">Belum Ada Foto Galeri</h5>
                <p class="text-muted small mb-0">Foto kegiatan sekolah akan diperbarui dan ditampilkan di sini.</p>
            </div>
        @endif
    </div>
</section>

<style>
    .hover-card { transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .hover-card:hover { transform: translateY(-4px); box-shadow: 0 12px 20px -5px rgba(0,0,0,0.08) !important; }
    .img-hover { transition: transform 0.3s ease; }
    .hover-card:hover .img-hover { transform: scale(1.05); }
</style>
@endsection
