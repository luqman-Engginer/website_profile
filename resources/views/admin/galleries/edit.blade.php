@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-sm rounded-4 p-4 max-w-2xl mx-auto">
        <h5 class="fw-bold text-dark mb-3">
            <i class="fa-solid fa-pen-to-square text-primary me-2"></i>Edit Foto Galeri
        </h5>

        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label small fw-semibold">Judul Kegiatan</label>
                <input type="text" name="title" class="form-control rounded-3" value="{{ old('title', $gallery->title) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-semibold">Foto Saat Ini</label>
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="rounded-3 shadow-sm" style="max-height: 150px;">
                </div>
                <input type="file" name="image" class="form-control rounded-3" accept="image/*">
                <small class="text-muted fs-7">Biarkan kosong jika tidak ingin mengubah foto.</small>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-semibold">Deskripsi</label>
                <textarea name="description" class="form-control rounded-3" rows="3">{{ old('description', $gallery->description) }}</textarea>
            </div>

            <div class="d-flex justify-content-end gap-2 pt-2">
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-light rounded-pill px-4">Batal</a>
                <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
