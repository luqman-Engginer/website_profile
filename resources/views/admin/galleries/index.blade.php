@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <!-- Header -->
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
            <div>
                <h4 class="fw-bold text-dark mb-1">
                    <i class="fa-solid fa-images text-primary me-2"></i>Kelola Galeri Sekolah
                </h4>
                <p class="text-muted small mb-0">Daftar semua foto dokumentasi kegiatan yang tersimpan di sistem.</p>
            </div>
            <a href="{{ route('admin.galleries.create') }}"
                class="btn btn-primary rounded-pill px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2 shadow-sm">
                <i class="fa-solid fa-plus"></i>
                <span>Tambah Foto Baru</span>
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center gap-2">
                <i class="fa-solid fa-circle-check fs-5"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <!-- Content Table / Cards -->
        <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="small text-muted text-uppercase">
                            <th class="ps-4" style="width: 60px;">#</th>
                            <th style="width: 120px;">Preview</th>
                            <th>Judul Kegiatan</th>
                            <th>Deskripsi</th>
                            <th class="text-end pe-4" style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @forelse($galleries as $index => $gallery)
                            <tr>
                                <td class="ps-4 text-muted fw-semibold small">{{ $index + 1 }}</td>
                                <td>
                                    <!-- Interactive Thumbnail Click to Preview -->
                                    <div class="position-relative overflow-hidden rounded-3 shadow-sm group-hover"
                                        style="width: 70px; height: 50px; cursor: pointer;" data-bs-toggle="modal"
                                        data-bs-target="#imageModal{{ $gallery->id }}">
                                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                                            class="w-100 h-100 object-fit-cover">
                                        <div
                                            class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-25 d-flex align-items-center justify-content-center opacity-0 hover-opacity-100 transition-all">
                                            <i class="fa-solid fa-magnifying-glass-plus text-white"></i>
                                        </div>
                                    </div>

                                    <!-- Image Modal Lightbox -->
                                    <div class="modal fade" id="imageModal{{ $gallery->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content border-0 bg-transparent">
                                                <div class="modal-body text-center position-relative p-0">
                                                    <button type="button"
                                                        class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3"
                                                        data-bs-dismiss="modal"></button>
                                                    <img src="{{ asset('storage/' . $gallery->image) }}"
                                                        class="img-fluid rounded-4 shadow-lg" alt="{{ $gallery->title }}">
                                                    <h5 class="text-white mt-3 fw-bold">{{ $gallery->title }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold text-dark d-block mb-0">{{ $gallery->title }}</span>
                                </td>
                                <td>
                                    <p class="text-muted small mb-0">
                                        {{ Str::limit($gallery->description, 70, '...') ?: '-' }}</p>
                                </td>
                                <td class="text-end pe-4">
                                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold">
                                            <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="py-4">
                                        <div class="bg-light rounded-circle d-inline-flex p-4 text-muted mb-3">
                                            <i class="fa-regular fa-images fs-1"></i>
                                        </div>
                                        <h6 class="fw-bold text-dark mb-1">Belum Ada Foto Galeri</h6>
                                        <p class="text-muted small mb-3">Galeri kegiatan sekolah Anda masih kosong saat ini.
                                        </p>
                                        <a href="{{ route('admin.galleries.create') }}"
                                            class="btn btn-primary btn-sm rounded-pill px-4">
                                            <i class="fa-solid fa-plus me-1"></i> Tambah Foto Sekarang
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .hover-opacity-100:hover {
            opacity: 1 !important;
        }

        .transition-all {
            transition: all 0.2s ease-in-out;
        }
    </style>
@endsection
