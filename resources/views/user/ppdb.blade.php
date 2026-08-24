@extends('layouts.user')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold mb-1">Formulir Pendaftaran PPDB</h3>
    <p class="text-muted">Isi data calon siswa secara lengkap dan benar.</p>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 bg-success text-white rounded-4 shadow-sm py-3 px-4 mb-4">
        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
    </div>
@endif

<div class="card-modern p-4 p-md-5">
    <form action="{{ route('user.ppdb.store') }}" method="POST">
        @csrf

        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold text-dark">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="form-control form-control-lg rounded-3 border-light-subtle" value="2026/2027" readonly style="background-color: #f8fafc;">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold text-dark">Nama Lengkap Siswa</label>
                <input type="text" name="nama_siswa" class="form-control form-control-lg rounded-3 @error('nama_siswa') is-invalid @enderror" value="{{ old('nama_siswa', auth()->user()->name) }}" required placeholder="Masukkan nama lengkap">
                @error('nama_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold text-dark">NISN (10 Digit)</label>
                <input type="number" name="nisn" class="form-control form-control-lg rounded-3 @error('nisn') is-invalid @enderror" value="{{ old('nisn') }}" required placeholder="Contoh: 0051234567">
                @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold text-dark">Pilihan Jurusan</label>
                <select name="jurusan" class="form-select form-select-lg rounded-3 @error('jurusan') is-invalid @enderror" required>
                    <option value="" disabled selected>-- Pilih Jurusan --</option>
                    <option value="RPL" {{ old('jurusan') == 'RPL' ? 'selected' : '' }}>Rekayasa Perangkat Lunak (RPL)</option>
                    <option value="TKJ" {{ old('jurusan') == 'TKJ' ? 'selected' : '' }}>Teknik Komputer & Jaringan (TKJ)</option>
                    <option value="MM" {{ old('jurusan') == 'MM' ? 'selected' : '' }}>Multimedia / DKV</option>
                </select>
                @error('jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold text-dark">Asal Sekolah (SMP/MTs)</label>
                <input type="text" name="asal_sekolah" class="form-control form-control-lg rounded-3 @error('asal_sekolah') is-invalid @enderror" value="{{ old('asal_sekolah') }}" required placeholder="Nama SMP/MTs asal">
                @error('asal_sekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold text-dark">Nama Orang Tua / Wali</label>
                <input type="text" name="nama_orang_tua" class="form-control form-control-lg rounded-3 @error('nama_orang_tua') is-invalid @enderror" value="{{ old('nama_orang_tua') }}" required placeholder="Nama lengkap Ayah/Ibu">
                @error('nama_orang_tua') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-12">
                <label class="form-label fw-semibold text-dark">No. WhatsApp / Kontak</label>
                <input type="number" name="no_whatsapp" class="form-control form-control-lg rounded-3 @error('no_whatsapp') is-invalid @enderror" value="{{ old('no_whatsapp') }}" required placeholder="Contoh: 081234567890">
                @error('no_whatsapp') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <hr class="my-5 opacity-10">

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-5 py-3 fw-bold shadow-sm">
                <i class="fa-solid fa-paper-plane me-2"></i> Kirim Pendaftaran PPDB
            </button>
        </div>
    </form>
</div>
@endsection
