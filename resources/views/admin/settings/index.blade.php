@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold mb-1">Pengaturan Sistem</h3>
    <p class="text-muted">Kelola informasi profil sekolah dan konfigurasi umum website.</p>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 bg-success text-white rounded-4 shadow-sm py-3 px-4 mb-4">
        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
    </div>
@endif

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card-modern p-4 p-md-5">
            <h5 class="fw-bold mb-4 text-dark">
                <i class="fa-solid fa-school me-2 text-primary"></i> Profil Sekolah
            </h5>

            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fw-semibold text-dark">Nama Sekolah / Instansi</label>
                    <input type="text" name="school_name" class="form-control form-control-lg rounded-3 @error('school_name') is-invalid @enderror" value="{{ old('school_name', $setting->school_name ?? '') }}" placeholder="Contoh: SMK Imaginatic Indonesia" required>
                    @error('school_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark">Email Sekolah</label>
                        <input type="email" name="email" class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror" value="{{ old('email', $setting->email ?? '') }}" placeholder="info@sekolah.sch.id">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark">Nomor Telepon / WhatsApp</label>
                        <input type="text" name="phone" class="form-control form-control-lg rounded-3 @error('phone') is-invalid @enderror" value="{{ old('phone', $setting->phone ?? '') }}" placeholder="081234567890">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-dark">Alamat Lengkap</label>
                    <textarea name="address" rows="3" class="form-control rounded-3 @error('address') is-invalid @enderror" placeholder="Jalan Raya No. 1, Kota Bekasi">{{ old('address', $setting->address ?? '') }}</textarea>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-5 py-3 fw-bold shadow-sm">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Panel Informasi Samping -->
    <div class="col-lg-4">
        <div class="card-modern p-4">
            <h5 class="fw-bold mb-3 text-dark">Petunjuk Pengaturan</h5>
            <p class="text-muted small">
                Informasi yang dikonfigurasi di halaman ini akan ditampilkan pada header portal siswa dan bukti formulir pendaftaran PPDB.
            </p>
            <hr class="my-3 opacity-10">
            <div class="d-flex align-items-center gap-3 text-muted small">
                <i class="fa-solid fa-circle-info text-primary fs-5"></i>
                <span>Pastikan alamat email dan nomor HP aktif agar calon siswa dapat menghubungi pihak panitia.</span>
            </div>
        </div>
    </div>
</div>
@endsection
