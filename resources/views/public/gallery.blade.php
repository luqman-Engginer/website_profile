@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h2 class="fw-bold text-dark">Galeri Kegiatan</h2>
        <p class="text-muted">Dokumentasi aktivitas dan fasilitas pembelajaran di sekolah kami.</p>
    </div>

    <div class="row g-4">
        @forelse($galleries as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card-modern overflow-hidden h-100">
                    <img src="{{ asset('storage/' . $item->image) }}" class="w-100" style="height: 220px; object-fit: cover;" alt="{{ $item->title }}">
                    <div class="p-4">
                        <h6 class="fw-bold text-dark mb-1">{{ $item->title }}</h6>
                        <p class="text-muted small m-0">{{ Str::limit($item->description, 80) }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5 text-muted">
                <p>Belum ada foto galeri publik.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
