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
                            <i class="fa-solid fa-user-plus text-primary me-2"></i>Tambah User Baru
                        </h4>
                        <p class="text-muted small mb-0">Buat akun pengguna baru dan tentukan hak aksesnya.</p>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <!-- NAMA LENGKAP -->
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Nama Lengkap <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted px-3"><i class="fa-regular fa-user"></i></span>
                            <input type="text" name="name" class="form-control bg-light border-start-0 py-2 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Contoh: Ahmad Subagja" required>
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
                            <input type="email" name="email" class="form-control bg-light border-start-0 py-2 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="nama@email.com" required>
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
                            <select name="role" class="form-select bg-light border-start-0 py-2 @error('role') is-invalid @enderror" required>
                                <option value="" disabled {{ old('role') ? '' : 'selected' }}>-- Pilih Role Hak Akses --</option>
                                @php
                                    $roleList = isset($roles) ? $roles : ['user', 'admin'];
                                @endphp
                                @foreach ($roleList as $role)
                                    @php
                                        $rName = is_array($role) ? ($role['name'] ?? '') : (is_object($role) ? ($role->name ?? '') : $role);
                                    @endphp
                                    <option value="{{ $rName }}" {{ old('role') == $rName ? 'selected' : '' }}>
                                        {{ ucfirst($rName) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')
                            <div class="text-danger small mt-1"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- PASSWORD & KONFIRMASI -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-secondary">Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" name="password" id="createPass" class="form-control bg-light border-end-0 py-2 @error('password') is-invalid @enderror" required placeholder="Minimal 8 karakter">
                                <button class="btn btn-light border border-start-0 text-muted px-3" type="button" onclick="togglePass('createPass', 'iconCreate1')">
                                    <i class="fa-regular fa-eye" id="iconCreate1"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-secondary">Konfirmasi Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="createPassConfirm" class="form-control bg-light border-end-0 py-2" required placeholder="Ulangi password">
                                <button class="btn btn-light border border-start-0 text-muted px-3" type="button" onclick="togglePass('createPassConfirm', 'iconCreate2')">
                                    <i class="fa-regular fa-eye" id="iconCreate2"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- ACTION BUTTONS -->
                    <div class="d-flex justify-content-end gap-2 pt-2">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light border rounded-pill px-4 fw-semibold">Batal</a>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
                            <i class="fa-solid fa-user-plus me-1"></i> Simpan User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePass(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }
</script>
@endsection
