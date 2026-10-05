@extends('layouts.admin')

@section('content')
<div class="container-fluid px-0">
    <div class="mb-4">
        <h2 class="fw-bold text-dark">Pengaturan Sekolah</h2>
        <p class="text-muted">Kelola identitas, link Instagram, alamat, peta, dan foto profil sekolah.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card card-modern p-4">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Sekolah -->
            <div class="mb-3">
                <label for="school_name" class="form-label fw-semibold">Nama Sekolah</label>
                <input type="text" class="form-control @error('school_name') is-invalid @enderror" id="school_name" name="school_name" value="{{ old('school_name', $setting->school_name ?? '') }}" placeholder="Masukkan nama sekolah">
                @error('school_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Sekolah -->
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email Sekolah</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $setting->email ?? '') }}" placeholder="contoh: info@sekolah.sch.id">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nomor Kontak -->
            <div class="mb-3">
                <label for="phone" class="form-label fw-semibold">Nomor Kontak</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $setting->phone ?? '') }}" placeholder="Contoh: 08xxxxxxxxxx">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label for="address" class="form-label fw-semibold">Lokasi / Alamat</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap sekolah...">{{ old('address', $setting->address ?? '') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Link Google Maps -->
            <div class="mb-3">
                <label for="map_link" class="form-label fw-semibold">Google Maps (Link URL atau Kode Embed Iframe)</label>
                <textarea class="form-control @error('map_link') is-invalid @enderror" id="map_link" name="map_link" rows="3" placeholder="Tempel link Google Maps atau kode <iframe ...> di sini">{{ old('map_link', $setting->map_link ?? '') }}</textarea>
                <div class="form-text text-muted">Tips: Gunakan fitur "Sematkan Peta (Embed a map)" dari Google Maps lalu salin kodenya ke sini agar peta langsung tampil interaktif di website.</div>
                @error('map_link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Social Media (Khusus Instagram) -->
            <div class="mb-3">
                <label for="social_media" class="form-label fw-semibold">Link Instagram Sekolah</label>
                <input type="url" class="form-control @error('social_media') is-invalid @enderror" id="social_media" name="social_media" value="{{ old('social_media', $setting->social_media ?? '') }}" placeholder="Contoh: https://instagram.com/namasekolah">
                <div class="form-text text-muted">Masukkan URL lengkap profil Instagram agar logo ikon Instagram di halaman kontak bisa diklik.</div>
                @error('social_media')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Foto / Profil Sekolah -->
            <div class="mb-4">
                <label for="school_photo" class="form-label fw-semibold">Foto / Profil Sekolah</label>
                @if(!empty($setting->school_photo))
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $setting->school_photo) }}" alt="Foto Sekolah" class="rounded border" style="height: 100px; object-fit: cover;">
                    </div>
                @endif
                <input type="file" class="form-control @error('school_photo') is-invalid @enderror" id="school_photo" name="school_photo">
                <div class="form-text text-muted">Format: JPG, PNG, WEBP (Maks. 2MB).</div>
                @error('school_photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow-sm d-flex align-items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
