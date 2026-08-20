@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <!-- HEADER -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">Manajemen Pengguna</h3>
            <p class="text-muted small mb-0">Kelola data akun pengguna, role, dan hak akses sistem.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm fw-semibold">
            <i class="fa-solid fa-user-plus me-1"></i> Tambah User
        </a>
    </div>

    <!-- FLASH MESSAGE -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-sm mb-4" role="alert">
            <i class="fa-solid fa-circle-exclamation me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- TABLE CARD -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light border-bottom">
                    <tr>
                        <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Nama</th>
                        <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Email</th>
                        <th class="px-4 py-3 text-secondary text-uppercase small fw-bold">Role</th>
                        <th class="px-4 py-3 text-secondary text-uppercase small fw-bold text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-4 py-3 font-medium text-dark fw-semibold">
                                {{ $user->name }}
                            </td>
                            <td class="px-4 py-3 text-muted">
                                {{ $user->email }}
                            </td>
                            <td class="px-4 py-3">
                                @php
                                    $roleName = data_get($user, 'role.name', data_get($user, 'role', 'user'));
                                    if (is_object($roleName)) {
                                        $roleName = 'user';
                                    }
                                @endphp
                                <span class="badge rounded-pill {{ strtolower($roleName) === 'admin' ? 'bg-primary-subtle text-primary border border-primary-subtle' : 'bg-info-subtle text-info border border-info-subtle' }} px-3 py-2 text-capitalize">
                                    {{ $roleName }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-light border rounded-pill px-3">
                                        <i class="fa-solid fa-pen-to-square text-secondary me-1"></i> Edit
                                    </a>
                                    @if (auth()->id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                                <i class="fa-solid fa-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                Belum ada data pengguna.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if (method_exists($users, 'hasPages') && $users->hasPages())
            <div class="px-4 py-3 border-top bg-light">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
