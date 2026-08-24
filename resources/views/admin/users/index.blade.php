@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark m-0">Data Pengguna</h3>
        <p class="text-muted small m-0">Kelola akun admin dan user sistem PPDB.</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-4 shadow-sm fw-semibold">
        <i class="fa-solid fa-user-plus me-2"></i> Tambah User
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 bg-success text-white rounded-3 shadow-sm py-3 px-4 mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="card-modern p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle m-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $index }}</td>
                        <td class="fw-bold text-dark">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role == 'admin')
                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">Admin</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2 rounded-pill">Siswa / User</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning text-white rounded-circle shadow-sm me-1" style="width: 35px; height: 35px; padding-top: 6px;">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger rounded-circle shadow-sm" style="width: 35px; height: 35px;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-5">Belum ada data user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginasi Bootstrap -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
