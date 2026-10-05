@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h2 class="fw-bold text-dark">Galeri Kegiatan</h2>
        <p class="text-muted">Dokumentasi aktivitas dan fasilitas pembelajaran di sekolah kami. Klik pada foto untuk memperbesar.</p>
    </div>

    <div class="row g-4">
        @forelse($galleries as $index => $item)
            <div class="col-md-6 col-lg-4">
                <div class="card-modern overflow-hidden h-100">
                    <!-- Setiap gambar punya ID modal unik berdasarkan perulangan $index -->
                    <img src="{{ asset('storage/' . $item->image) }}"
                         class="w-100 img-fluid"
                         style="height: 220px; object-fit: cover; cursor: pointer;"
                         alt="{{ $item->title }}"
                         data-bs-toggle="modal"
                         data-bs-target="#imageModal{{ $index }}">
                    <div class="p-4">
                        <h6 class="fw-bold text-dark mb-1">{{ $item->title }}</h6>
                        <p class="text-muted small m-0">{{ Str::limit($item->description, 80) }}</p>
                    </div>
                </div>
            </div>

            <!-- Modal unik untuk masing-masing foto (Tanpa script JS, dijamin langsung muncul) -->
            <div class="modal fade" id="imageModal{{ $index }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg bg-white">
                        <div class="modal-header border-0 pb-0">
                            <h5 class="modal-title fw-bold text-dark">{{ $item->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center p-4">
                            <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded-3 mb-3 mx-auto shadow-sm" style="max-height: 70vh; width: auto; display: block;">
                            <p class="text-muted small m-0">{{ $item->description }}</p>
                        </div>
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
