@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.users.index') }}" class="btn btn-light text-secondary rounded-pill btn-sm px-3 mb-2">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
    <h3 class="fw-bold text-dark m-0">Tambah Pengguna Baru</h3>
</div>

<div class="card-modern p-4 p-md-5" style="max-width: 600px;">
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Lengkap</label>
            <input type="text" name="name" class="form-control rounded-3" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Alamat Email</label>
            <input type="email" name="email" class="form-control rounded-3" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Role / Hak Akses</label>
            <select name="role" class="form-select rounded-3" required>
                <option value="user">Siswa / User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Password</label>
            <input type="password" name="password" class="form-control rounded-3" placeholder="Minimal 6 karakter" required>
        </div>

        <button type="submit" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-4 py-2 fw-bold shadow-sm">
            <i class="fa-solid fa-user-plus me-2"></i> Simpan User
        </button>
    </form>
</div>
@endsection
