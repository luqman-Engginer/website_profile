@extends('layouts.admin')

@section('content')
<div class="container-fluid px-0">
    <!-- Header Page -->
    <div class="mb-4">
        <h2 class="fw-bold text-dark">Pengaturan Sekolah</h2>
        <p class="text-muted">Kelola identitas dan informasi umum sekolah.</p>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Setting Card -->
    <div class="card card-modern p-4">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama Sekolah -->
            <div class="mb-3">
                <label for="school_name" class="form-label fw-semibold">Nama Sekolah</label>
                <input type="text" class="form-control @error('school_name') is-invalid @enderror" id="school_name" name="school_name" value="{{ old('school_name', $setting->school_name ?? '') }}" placeholder="Masukkan nama sekolah">
                <div class="form-text text-muted">Perubahan nama ini akan langsung memperbarui teks pada logo/sidebar secara otomatis.</div>
                @error('school_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Sekolah (Yang tadinya ketinggalan) -->
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email Sekolah</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $setting->email ?? '') }}" placeholder="contoh: info@sekolah.sch.id">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nomor Kontak / Telepon -->
            <div class="mb-3">
                <label for="phone" class="form-label fw-semibold">Nomor Kontak</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $setting->phone ?? '') }}" placeholder="Contoh: 021-xxxxxxx atau 08xxxxxxxxxx">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Lokasi / Alamat -->
            <div class="mb-4">
                <label for="address" class="form-label fw-semibold">Lokasi / Alamat</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap sekolah...">{{ old('address', $setting->address ?? '') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Simpan -->
            <div>
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow-sm d-flex align-items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
