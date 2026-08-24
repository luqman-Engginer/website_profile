@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark m-0">Kelola Pendaftaran PPDB</h3>
        <p class="text-muted small m-0">Daftar calon siswa yang sudah mengajukan pendaftaran.</p>
    </div>
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
                    <th>Nama Siswa</th>
                    <th>NISN</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ppdbs as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-bold text-dark">{{ $item->full_name ?? $item->user->name }}</td>
                        <td>{{ $item->nisn ?? '-' }}</td>
                        <td>{{ $item->major ?? '-' }}</td>
                        <td>
                            @if($item->status == 'Diterima')
                                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Diterima</span>
                            @elseif($item->status == 'Ditolak')
                                <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">Ditolak</span>
                            @else
                                <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill">Menunggu</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.ppdb.show', $item->id) }}" class="btn btn-sm btn-primary rounded-circle shadow-sm me-1" style="width: 35px; height: 35px; padding-top: 6px;">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.ppdb.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data pendaftaran ini?')">
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
                        <td colspan="6" class="text-center text-muted py-5">Belum ada data pendaftaran masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
