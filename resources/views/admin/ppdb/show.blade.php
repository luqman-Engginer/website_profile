@extends('layouts.admin')

@section('content')
<!-- Bagian Header Detail & Tombol Cetak PDF -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <a href="{{ route('admin.ppdb.index') }}" class="btn btn-light text-secondary rounded-pill btn-sm px-3 mb-3 shadow-sm border-0">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar PPDB
        </a>
        <h3 class="fw-bold text-dark m-0">Detail Pendaftaran Calon Siswa</h3>
        <p class="text-muted small m-0">Periksa kelengkapan data dan lakukan verifikasi status pendaftaran.</p>
    </div>

    <!-- Tombol Cetak PDF Individual -->
    <div>
        <a href="{{ route('admin.ppdb.export-single-pdf', $ppdb->id) }}" target="_blank" class="btn btn-danger rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #dc3545; border: none;">
            <i class="fa-solid fa-file-pdf"></i> Cetak Formulir PDF
        </a>
    </div>
</div>

    @if(session('success'))
        <div class="alert alert-success border-0 bg-success text-white rounded-3 shadow-sm py-3 px-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        <!-- Informasi Biodata Pendaftar Lengkap -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                <h5 class="fw-bold text-dark mb-4 border-bottom pb-3"><i class="fa-solid fa-user-graduate me-2 text-primary"></i> Data Pribadi Siswa</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Nama Lengkap</span>
                        <h6 class="fw-bold text-dark">{{ $ppdb->nama_siswa ?? '-' }}</h6>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">NISN</span>
                        <h6 class="fw-bold text-dark">{{ $ppdb->nisn ?? '-' }}</h6>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Jenis Kelamin</span>
                        <h6 class="fw-bold text-dark">{{ $ppdb->jenis_kelamin ?? '-' }}</h6>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Jurusan Pilihan</span>
                        <h6 class="fw-bold text-primary">{{ $ppdb->jurusan ?? '-' }}</h6>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Asal Sekolah</span>
                        <h6 class="fw-bold text-dark">{{ $ppdb->asal_sekolah ?? '-' }}</h6>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Tahun Ajaran</span>
                        <h6 class="fw-bold text-dark">{{ $ppdb->tahun_ajaran ?? '-' }}</h6>
                    </div>
                    <div class="col-12">
                        <span class="text-muted small d-block">Alamat Lengkap</span>
                        <h6 class="fw-bold text-dark">{{ $ppdb->alamat ?? '-' }}</h6>
                    </div>
                </div>
            </div>

            <!-- Data Orang Tua & Pekerjaan -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h5 class="fw-bold text-dark mb-4 border-bottom pb-3"><i class="fa-solid fa-users me-2 text-primary"></i> Data Orang Tua & Pekerjaan</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Nama Ayah</span>
                        <h6 class="fw-bold text-dark">{{ $ppdb->nama_ayah ?? '-' }}</h6>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Pekerjaan Ayah</span>
                        <h6 class="fw-bold text-dark">{{ $ppdb->pekerjaan_ayah ?? '-' }}</h6>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Nama Ibu</span>
                        <h6 class="fw-bold text-dark">{{ $ppdb->nama_ibu ?? '-' }}</h6>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Pekerjaan Ibu</span>
                        <h6 class="fw-bold text-dark">{{ $ppdb->pekerjaan_ibu ?? '-' }}</h6>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small d-block">Nomor WhatsApp</span>
                        <h6 class="fw-bold text-dark">{{ $ppdb->no_whatsapp ?? '-' }}</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Aksi Verifikasi Status -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
                <div>
                    <h5 class="fw-bold text-dark mb-3">Aksi Verifikasi</h5>
                    <hr class="text-muted opacity-25 mb-4">

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
