@extends('layouts.user')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold mb-1">Pengaturan Profil</h3>
    <p class="text-muted">Kelola informasi data diri dan kata sandi akun Anda.</p>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 bg-success text-white rounded-4 shadow-sm py-3 px-4 mb-4">
        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
    </div>
@endif

<div class="row g-4">
    <!-- Card Info Ringkas -->
    <div class="col-lg-4">
        <div class="card-modern p-4 text-center">
            <div class="mb-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff&bold=true&size=128" class="rounded-circle shadow-sm" width="100" height="100" alt="Avatar">
            </div>
            <h5 class="fw-bold text-dark mb-1">{{ auth()->user()->name }}</h5>
            <p class="text-muted small mb-3">{{ auth()->user()->email }}</p>
            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 border border-primary border-opacity-25">
                <i class="fa-solid fa-user-graduate me-1"></i> Calon Siswa
            </span>
        </div>
    </div>

    <!-- Form Update Profil & Password -->
    <div class="col-lg-8">
        <div class="card-modern p-4 p-md-5">
            <h5 class="fw-bold mb-4 text-dark"><i class="fa-solid fa-user-pen me-2 text-primary"></i> Edit Informasi Akun</h5>

            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fw-semibold text-dark">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control form-control-lg rounded-3 @error('name') is-invalid @enderror" value="{{ old('name', auth()->user()->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-dark">Alamat Email</label>
                    <input type="email" name="email" class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror" value="{{ old('email', auth()->user()->email) }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <hr class="my-4 opacity-10">

                <h6 class="fw-bold mb-3 text-dark"><i class="fa-solid fa-lock me-2 text-warning"></i> Ubah Password (Opsional)</h6>
                <p class="text-muted small mb-4">Kosongkan jika tidak ingin mengubah password akun Anda saat ini.</p>

                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-dark">Password Baru</label>
                        <input type="password" name="password" class="form-control form-control-lg rounded-3 @error('password') is-invalid @enderror" placeholder="Minimal 6 karakter">
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-dark">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control form-control-lg rounded-3" placeholder="Ulangi password baru">
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-5 py-3 fw-bold shadow-sm">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
