@extends('layouts.user')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-dark">Formulir Pendaftaran PPDB</h3>
                <p class="text-muted small">Silakan lengkapi data diri, asal sekolah, dan data orang tua Anda secara akurat.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 bg-success text-white rounded-3 small py-3 mb-4 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(isset($ppdb))
                <!-- 1. KOTAK STATUS PENDAFTARAN (Dipisah agar jelas) -->
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
                                <i class="fa-solid fa-circle-check fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 text-dark">Anda Sudah Terdaftar!</h5>
                                <p class="text-muted small mb-0">Data pendaftaran Anda telah tersimpan di sistem.</p>
                            </div>
                        </div>
                        <div>
                            @if($ppdb->status == 'Diterima')
                                <span class="badge bg-success text-white px-3 py-2 rounded-pill fs-6">
                                    <i class="fa-solid fa-check me-1"></i> Diterima
                                </span>
                            @elseif($ppdb->status == 'Ditolak')
                                <span class="badge bg-danger text-white px-3 py-2 rounded-pill fs-6">
                                    <i class="fa-solid fa-xmark me-1"></i> Ditolak
                                </span>
                            @else
                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fs-6">
                                    <i class="fa-solid fa-hourglass-half me-1"></i> Menunggu Verifikasi
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- 2. KOTAK DETAIL DATA PENDAFTAR (Dibuat lebih rapi, longgar, tidak mepet) -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <h5 class="fw-bold text-dark mb-4 pb-2 border-bottom">Detail Data Pendaftar</h5>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <span class="text-muted small d-block mb-1">Nama Lengkap Siswa</span>
                                <h6 class="fw-semibold text-dark mb-0">{{ $ppdb->nama_siswa }}</h6>
                            </div>
                            <div class="mb-3">
                                <span class="text-muted small d-block mb-1">Jurusan Pilihan</span>
                                <h6 class="fw-semibold text-dark mb-0">{{ $ppdb->jurusan }}</h6>
                            </div>
                            <div class="mb-3">
                                <span class="text-muted small d-block mb-1">Nama Ayah & Pekerjaan</span>
                                <h6 class="fw-semibold text-dark mb-0">{{ $ppdb->nama_ayah }} ({{ $ppdb->pekerjaan_ayah }})</h6>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <span class="text-muted small d-block mb-1">NISN</span>
                                <h6 class="fw-semibold text-dark mb-0">{{ $ppdb->nisn }}</h6>
                            </div>
                            <div class="mb-3">
                                <span class="text-muted small d-block mb-1">Asal Sekolah</span>
                                <h6 class="fw-semibold text-dark mb-0">{{ $ppdb->asal_sekolah }}</h6>
                            </div>
                            <div class="mb-3">
                                <span class="text-muted small d-block mb-1">Nama Ibu & Pekerjaan</span>
                                <h6 class="fw-semibold text-dark mb-0">{{ $ppdb->nama_ibu }} ({{ $ppdb->pekerjaan_ibu }})</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- FORMULIR PENDAFTARAN -->
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                    <form action="{{ route('user.ppdb') }}" method="POST">
                        @csrf

                        <!-- Bagian 1: Data Siswa -->
                        <h6 class="fw-bold text-primary mb-3"><i class="fa-solid fa-user me-2"></i> 1. Informasi Calon Siswa</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Tahun Ajaran</label>
                                <input type="text" name="tahun_ajaran" class="form-control rounded-3 py-2" value="2026/2027" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Nama Lengkap Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control rounded-3 py-2" value="{{ old('nama_siswa') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">NISN</label>
                                <input type="number" name="nisn" class="form-control rounded-3 py-2" value="{{ old('nisn') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select rounded-3 py-2" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Jurusan Pilihan</label>
                                <select name="jurusan" class="form-select rounded-3 py-2" required>
                                    <option value="">-- Pilih Jurusan --</option>
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak (RPL)</option>
                                    <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan (TKJ)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control rounded-3 py-2" value="{{ old('asal_sekolah') }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-muted small fw-bold">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control rounded-3 py-2" rows="2" required>{{ old('alamat') }}</textarea>
                            </div>
                        </div>

                        <!-- Bagian 2: Data Orang Tua -->
                        <h6 class="fw-bold text-primary mb-3"><i class="fa-solid fa-users me-2"></i> 2. Informasi Orang Tua / Wali</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Nama Ayah</label>
                                <input type="text" name="nama_ayah" class="form-control rounded-3 py-2" value="{{ old('nama_ayah') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Pekerjaan Ayah</label>
                                <input type="text" name="pekerjaan_ayah" class="form-control rounded-3 py-2" value="{{ old('pekerjaan_ayah') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control rounded-3 py-2" value="{{ old('nama_ibu') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold">Pekerjaan Ibu</label>
                                <input type="text" name="pekerjaan_ibu" class="form-control rounded-3 py-2" value="{{ old('pekerjaan_ibu') }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-muted small fw-bold">Nomor WhatsApp Aktif</label>
                                <input type="number" name="no_whatsapp" class="form-control rounded-3 py-2" value="{{ old('no_whatsapp') }}" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-semibold shadow-sm" style="background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%); border: none;">
                            Kirim Pendaftaran Sekarang
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
