@extends('layouts.user')

@section('content')
<div class="container-fluid p-0 d-flex justify-content-center">
    <div style="width: 100%; max-width: 650px;">

        <div class="text-center mb-4">
            <h4 class="fw-bold text-dark mb-1">Profil Saya</h4>
            <p class="text-muted small">Kelola informasi akun dan kata sandi kamu.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-5">
            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control rounded-3 @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Alamat Email</label>
                    <input type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Kata Sandi Baru <span class="text-muted fw-normal">(Kosongkan jika tidak diubah)</span></label>
                    <input type="password" name="password" class="form-control rounded-3 @error('password') is-invalid @enderror" placeholder="Masukkan kata sandi baru">
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold small">Konfirmasi Kata Sandi Baru</label>
                    <input type="password" name="password_confirmation" class="form-control rounded-3" placeholder="Ulangi kata sandi baru">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
