@extends('layouts.admin')

@section('content')
<div class="container-fluid py-2">
    <div class="mb-4">
        <a href="{{ route('admin.ppdb.index') }}" class="btn btn-light text-secondary rounded-pill btn-sm px-3 mb-3 shadow-sm border-0">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar PPDB
        </a>
        <h3 class="fw-bold text-dark m-0">Detail Pendaftaran Calon Siswa</h3>
        <p class="text-muted small m-0">Periksa kelengkapan data dan lakukan verifikasi status pendaftaran.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 bg-success text-white rounded-3 shadow-sm py-3 px-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        <!-- Informasi Biodata Pendaftar -->
        <div class="col-lg-8">
            <div class="card-modern border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <h5 class="fw-bold text-dark mb-4">Informasi Formulir Siswa</h5>

                <div class="row g-4">
                    <div class="col-md-6">
                        <span class="text-muted small d-block mb-1">Nama Lengkap Siswa</span>
                        <h6 class="fw-bold text-dark m-0">{{ $ppdb->nama_siswa ?? $ppdb->user->name ?? '-' }}</h6>
                    </div>

                    <div class="col-md-6">
                        <span class="text-muted small d-block mb-1">NISN</span>
                        <h6 class="fw-bold text-dark m-0">{{ $ppdb->nisn ?? '-' }}</h6>
                    </div>

                    <div class="col-md-6">
                        <span class="text-muted small d-block mb-1">Jurusan Pilihan</span>
                        <h6 class="fw-bold text-primary m-0">{{ $ppdb->jurusan ?? '-' }}</h6>
                    </div>

                    <div class="col-md-6">
                        <span class="text-muted small d-block mb-1">Nomor WhatsApp</span>
                        <h6 class="fw-bold text-dark m-0">{{ $ppdb->no_whatsapp ?? '-' }}</h6>
                    </div>

                    <div class="col-md-6">
                        <span class="text-muted small d-block mb-1">Asal Sekolah</span>
                        <h6 class="fw-bold text-dark m-0">{{ $ppdb->asal_sekolah ?? '-' }}</h6>
                    </div>

                    <div class="col-md-6">
                        <span class="text-muted small d-block mb-1">Nama Orang Tua / Wali</span>
                        <h6 class="fw-bold text-dark m-0">{{ $ppdb->nama_orang_tua ?? '-' }}</h6>
                    </div>

                    <div class="col-md-6">
                        <span class="text-muted small d-block mb-1">Tahun Ajaran</span>
                        <span class="text-dark fw-medium">{{ $ppdb->tahun_ajaran ?? '-' }}</span>
                    </div>

                    <div class="col-md-6">
                        <span class="text-muted small d-block mb-1">Tanggal Pendaftaran</span>
                        <span class="text-dark fw-medium">{{ $ppdb->created_at ? $ppdb->created_at->format('d M Y, H:i') : '-' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Aksi Verifikasi Status -->
        <div class="col-lg-4">
            <div class="card-modern border-0 shadow-sm rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
                <div>
                    <h5 class="fw-bold text-dark mb-3">Aksi Verifikasi</h5>
                    <hr class="text-muted opacity-25 mb-4">

                    <!-- Form Update Status -->
                    <form action="{{ route('admin.ppdb.update', $ppdb->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="status" class="form-label text-muted small fw-bold">Status Pendaftaran</label>
                            <select name="status" id="status" class="form-select rounded-3 py-2 border-light bg-light" required>
                                <option value="Menunggu" {{ $ppdb->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="Diterima" {{ $ppdb->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="Ditolak" {{ $ppdb->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-semibold shadow-sm d-flex align-items-center justify-content-center gap-2 mt-4" style="background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%); border: none;">
                            <i class="fa-solid fa-check-circle"></i> Update Status
                        </button>
                    </form>
                </div>

                <div class="mt-4 p-3 bg-light rounded-3">
                    <small class="text-muted d-block text-center">Status Saat Ini:
                        <span class="fw-bold
                            @if($ppdb->status == 'Diterima') text-success
                            @elseif($ppdb->status == 'Ditolak') text-danger
                            @else text-warning @endif">
                            {{ $ppdb->status }}
                        </span>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
