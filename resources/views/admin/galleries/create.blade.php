@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <!-- Header & Tombol Kembali di Tengah/Selaras -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-light text-secondary rounded-pill btn-sm px-3 mb-3 shadow-sm border-0">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Galeri
            </a>
            <h3 class="fw-bold text-dark m-0">Tambah Foto Galeri</h3>
            <p class="text-muted small m-0">Upload dokumentasi kegiatan dan fasilitas sekolah.</p>
        </div>
    </div>

    <!-- Form Card Terpusat (Centered) -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">Judul Foto / Kegiatan</label>
                        <input type="text" name="title" class="form-control rounded-3 py-2 @error('title') is-invalid @enderror" value="{{ old('title') }}" required placeholder="Contoh: Suasana Lab Komputer RPL">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">File Foto</label>
                        <input type="file" name="image" class="form-control rounded-3 py-2 @error('image') is-invalid @enderror" accept="image/*" required>
                        <small class="text-muted d-block mt-1">Format: JPG, JPEG, PNG (Maksimal 2MB)</small>
                        @error('image') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">Deskripsi Singkat (Opsional)</label>
                        <textarea name="description" rows="3" class="form-control rounded-3 @error('description') is-invalid @enderror" placeholder="Tuliskan keterangan mengenai foto ini...">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-2">
                        <a href="{{ route('admin.galleries.index') }}" class="btn btn-light rounded-pill px-4 py-2 fw-semibold text-muted">Batal</a>
                        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow-sm" style="background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%); border: none;">
                            <i class="fa-solid fa-cloud-arrow-up me-2"></i> Upload Foto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
