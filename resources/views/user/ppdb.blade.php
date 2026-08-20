@extends('layouts.user')

@section('content')
<div class="container-fluid p-0 d-flex justify-content-center">
    <div style="width: 100%; max-width: 800px;">

        <!-- Header -->
        <div class="text-center mb-4">
            <h4 class="fw-bold text-dark mb-1">Pendaftaran PPDB</h4>
            <p class="text-muted small">Silakan lengkapi formulir di bawah ini dengan data yang benar.</p>
        </div>

        <!-- Stepper Info Alur -->
        <div class="row g-2 mb-4 text-center">
            <div class="col-6 col-md-3">
                <div class="p-3 bg-white rounded-3 shadow-sm border-start border-primary border-4">
                    <span class="d-block fw-bold text-primary">01</span>
                    <small class="text-muted">Isi Formulir</small>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 bg-white rounded-3 shadow-sm">
                    <span class="d-block fw-bold text-secondary">02</span>
                    <small class="text-muted">Lengkapi Berkas</small>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 bg-white rounded-3 shadow-sm">
                    <span class="d-block fw-bold text-secondary">03</span>
                    <small class="text-muted">Verifikasi Data</small>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 bg-white rounded-3 shadow-sm">
                    <span class="d-block fw-bold text-secondary">04</span>
                    <small class="text-muted">Konfirmasi Final</small>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4">
                <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Card Form PPDB Tengah -->
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-5">
            <form action="{{ route('user.ppdb.store') }}" method="POST">
                @csrf

                <!-- Section: Tahun Ajaran -->
                <div class="mb-4">
                    <label class="form-label fw-semibold small">Tahun Ajaran yang Dituju <span class="text-danger">*</span></label>
                    <select name="tahun_ajaran" class="form-select rounded-3 @error('tahun_ajaran') is-invalid @enderror" required>
                        <option value="" selected disabled>-- Pilih Tahun Ajaran --</option>
                        <option value="2026/2027" {{ old('tahun_ajaran') == '2026/2027' ? 'selected' : '' }}>2026/2027</option>
                        <option value="2027/2028" {{ old('tahun_ajaran') == '2027/2028' ? 'selected' : '' }}>2027/2028</option>
                    </select>
                    @error('tahun_ajaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <h5 class="fw-bold text-primary mb-3"><i class="fa-solid fa-user me-2"></i>A. Data Calon Siswa</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Nama Lengkap Siswa <span class="text-danger">*</span></label>
                    <input type="text" name="nama_siswa" class="form-control rounded-3 @error('nama_siswa') is-invalid @enderror" value="{{ old('nama_siswa', $user->name) }}" required>
                    @error('nama_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">NISN <span class="text-danger">*</span></label>
                        <input type="number" name="nisn" class="form-control rounded-3 @error('nisn') is-invalid @enderror" placeholder="10 Digit NISN" value="{{ old('nisn') }}" required>
                        @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Pilihan Jurusan <span class="text-danger">*</span></label>
                        <select name="jurusan" class="form-select rounded-3 @error('jurusan') is-invalid @enderror" required>
                            <option value="" selected disabled>-- Pilih Jurusan --</option>
                            <option value="RPL" {{ old('jurusan') == 'RPL' ? 'selected' : '' }}>Rekayasa Perangkat Lunak (RPL)</option>
                            <option value="TKJ" {{ old('jurusan') == 'TKJ' ? 'selected' : '' }}>Teknik Komputer & Jaringan (TKJ)</option>
                        </select>
                        @error('jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold small">Asal Sekolah <span class="text-danger">*</span></label>
                    <input type="text" name="asal_sekolah" class="form-control rounded-3 @error('asal_sekolah') is-invalid @enderror" placeholder="Nama Sekolah Asal" value="{{ old('asal_sekolah') }}" required>
                    @error('asal_sekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <h5 class="fw-bold text-primary mb-3"><i class="fa-solid fa-users me-2"></i>B. Data Orang Tua / Wali</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Nama Orang Tua / Wali <span class="text-danger">*</span></label>
                    <input type="text" name="nama_orang_tua" class="form-control rounded-3 @error('nama_orang_tua') is-invalid @enderror" value="{{ old('nama_orang_tua') }}" required>
                    @error('nama_orang_tua') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold small">Nomor WhatsApp Orang Tua <span class="text-danger">*</span></label>
                    <input type="number" name="no_whatsapp" class="form-control rounded-3 @error('no_whatsapp') is-invalid @enderror" placeholder="08xxxxxxxxxx" value="{{ old('no_whatsapp') }}" required>
                    @error('no_whatsapp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold">
                        <i class="fa-solid fa-paper-plane me-1"></i> Kirim Pendaftaran PPDB
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
