@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4 p-md-5">
                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">
                            <i class="fa-solid fa-user-pen text-warning me-2"></i>Edit Data User
                        </h4>
                        <p class="text-muted small mb-0">Perbarui informasi akun milik {{ $user->name }}.</p>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- NAMA LENGKAP -->
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Nama Lengkap <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted px-3"><i class="fa-regular fa-user"></i></span>
                            <input type="text" name="name" class="form-control bg-light border-start-0 py-2 @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                        </div>
                        @error('name')
                            <div class="text-danger small mt-1"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Alamat Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted px-3"><i class="fa-regular fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control bg-light border-start-0 py-2 @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                        </div>
                        @error('email')
                            <div class="text-danger small mt-1"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ROLE -->
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">Role / Peran <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted px-3"><i class="fa-solid fa-user-shield"></i></span>
                            @php
                                $userCurrentRole = data_get($user, 'role.name', data_get($user, 'role', 'user'));
                                if (is_object($userCurrentRole)) {
                                    $userCurrentRole = 'user';
                                }
                                $roleList = isset($roles) ? $roles : ['user', 'admin'];
                            @endphp
                            <select name="role" class="form-select bg-light border-start-0 py-2 @error('role') is-invalid @enderror" required>
                                @foreach ($roleList as $role)
                                    @php
                                        $rName = is_array($role) ? ($role['name'] ?? '') : (is_object($role) ? ($role->name ?? '') : $role);
                                    @endphp
                                    <option value="{{ $rName }}" {{ old('role', $userCurrentRole) == $rName ? 'selected' : '' }}>
                                        {{ ucfirst($rName) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')
                            <div class="text-danger small mt-1"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">
                    <p class="text-muted small fw-semibold mb-2">Ubah Password (Kosongkan jika tidak merubah password):</p>

                    <!-- PASSWORD BARU -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-secondary">Password Baru</label>
                            <input type="password" name="password" class="form-control bg-light py-2 @error('password') is-invalid @enderror" placeholder="Kosongkan jika tak diubah">
                            @error('password')
                                <div class="text-danger small mt-1"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-secondary">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" class="form-control bg-light py-2" placeholder="Ulangi password baru">
                        </div>
                    </div>

                    <!-- ACTION BUTTONS -->
                    <div class="d-flex justify-content-end gap-2 pt-2">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light border rounded-pill px-4 fw-semibold">Batal</a>
                        <button type="submit" class="btn btn-warning text-white rounded-pill px-4 fw-semibold shadow-sm">
                            <i class="fa-solid fa-pen-to-square me-1"></i> Perbarui Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
