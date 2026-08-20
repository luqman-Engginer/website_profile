@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">
                <!-- Header Section -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">
                            <i class="fa-solid fa-sliders text-primary me-2"></i>Pengaturan Profil Sekolah
                        </h4>
                        <p class="text-muted small mb-0">Kelola informasi dasar sekolah yang akan ditampilkan secara publik
                            di portal utama.</p>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success border-0 shadow-sm rounded-4 d-flex align-items-center gap-2 mb-4 p-3">
                        <i class="fa-solid fa-circle-check fs-5"></i>
                        <div class="fw-medium">{{ session('success') }}</div>
                    </div>
                @endif

                <!-- Form Card -->
                <div class="card border-0 shadow-sm rounded-4 bg-white">
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Nama Sekolah -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark small">
                                    <i class="fa-solid fa-school me-2 text-primary"></i>Nama Resmi Sekolah <span
                                        class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted px-3"><i
                                            class="fa-solid fa-building"></i></span>
                                    <input type="text" name="school_name"
                                        class="form-control bg-light border-start-0 py-2 fs-6 @error('school_name') is-invalid @enderror"
                                        value="{{ old('school_name', $setting->school_name ?? '') }}"
                                        placeholder="Contoh: SMK Negeri 1 Jakarta" required>
                                </div>
                                @error('school_name')
                                    <div class="text-danger small mt-1"><i
                                            class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Telepon / WA -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark small">
                                    <i class="fa-solid fa-phone me-2 text-primary"></i>Nomor Telepon / WhatsApp Contact
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted px-3"><i
                                            class="fa-brands fa-whatsapp"></i></span>
                                    <input type="text" name="contact_number"
                                        class="form-control bg-light border-start-0 py-2 fs-6 @error('contact_number') is-invalid @enderror"
                                        value="{{ old('contact_number', $setting->contact_number ?? '') }}"
                                        placeholder="Contoh: 081234567890">
                                </div>
                                @error('contact_number')
                                    <div class="text-danger small mt-1"><i
                                            class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Alamat Lengkap -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark small">
                                    <i class="fa-solid fa-location-dot me-2 text-primary"></i>Lokasi / Alamat Lengkap
                                </label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text bg-light border-end-0 text-muted px-3 align-items-start pt-2"><i
                                            class="fa-solid fa-map-location-dot"></i></span>
                                    <textarea name="location" class="form-control bg-light border-start-0 fs-6 @error('location') is-invalid @enderror"
                                        rows="4" placeholder="Tuliskan alamat lengkap sekolah beserta kode pos...">{{ old('location', $setting->location ?? '') }}</textarea>
                                </div>
                                @error('location')
                                    <div class="text-danger small mt-1"><i
                                            class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="my-4 opacity-25">

                            <!-- Action Buttons -->
                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit"
                                    class="btn btn-primary rounded-pill px-4 py-2.5 fw-semibold shadow-sm d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                    <span>Simpan Perubahan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
