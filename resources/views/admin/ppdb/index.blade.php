@extends('layouts.admin')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h3 class="fw-bold text-dark m-0">Kelola Pendaftaran PPDB</h3>
        <p class="text-muted small m-0">Daftar calon siswa yang sudah mengajukan pendaftaran.</p>
    </div>

    <!-- Bagian Filter, Search & Tombol Ekspor -->
    <div class="d-flex flex-wrap gap-2 align-items-center">

        <!-- TOMBOL DROPDOWN EKSPOR (EXCEL & PDF) -->
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle rounded-pill px-3 py-2 shadow-sm border-0 d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" style="font-size: 14px; background-color: #10b981;">
                <i class="fa-solid fa-file-arrow-down"></i> Ekspor Data
            </button>
            <ul class="dropdown-menu shadow border-0 rounded-3">
                <li>
                    <a class="dropdown-item py-2 px-3 d-flex align-items-center gap-2" href="{{ route('admin.ppdb.export.excel') }}">
                        <i class="fa-solid fa-file-excel text-success"></i> Ekspor ke Excel (CSV)
                    </a>
                </li>
                <li>
                    <a class="dropdown-item py-2 px-3 d-flex align-items-center gap-2" href="{{ route('admin.ppdb.export.pdf') }}" target="_blank">
                        <i class="fa-solid fa-file-pdf text-danger"></i> Cetak PDF (Portrait)
                    </a>
                </li>
            </ul>
        </div>

        <form action="{{ route('admin.ppdb.index') }}" method="GET" class="d-flex flex-wrap gap-2 align-items-center">
            <!-- Filter Status -->
            <select name="status" class="form-select rounded-pill px-3 py-2 text-secondary bg-white shadow-sm" style="width: 150px; font-size: 14px;" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="Menunggu" {{ request('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>

            <!-- Search Bar dengan UI yang Rapi dan Bersih dari Bug -->
            <div class="input-group shadow-sm rounded-pill bg-white overflow-hidden" style="width: 250px;">
                <input type="text" name="search" class="form-control border-0 px-3 py-2 bg-transparent shadow-none" style="font-size: 14px;" placeholder="Cari nama / NISN..." value="{{ request('search') }}">
                <button class="btn btn-primary px-3 border-0" type="submit" style="background-color: #0d6efd;">
                    <i class="fa-solid fa-search"></i>
                </button>
                @if(request('search') || request('status'))
                    <a href="{{ route('admin.ppdb.index') }}" class="btn btn-outline-secondary border-0 d-flex align-items-center justify-content-center bg-light" style="width: 40px;" title="Reset Filter">
                        <i class="fa-solid fa-rotate-left text-secondary"></i>
                    </a>
                @endif
            </div>
        </form>
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
                    <th>Orang Tua</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ppdbs as $index => $item)
                    <tr>
                        <td>{{ $ppdbs->firstItem() + $index }}</td>
                        <td class="fw-bold text-dark">{{ $item->nama_siswa ?? '-' }}</td>
                        <td>{{ $item->nisn ?? '-' }}</td>
                        <td>{{ $item->jurusan ?? '-' }}</td>
                        <td>{{ $item->nama_orang_tua ?? '-' }}</td>
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
                        <td colspan="7" class="text-center text-muted py-5">
                            <i class="fa-solid fa-folder-open fs-2 mb-2 d-block text-secondary"></i>
                            Data pendaftaran tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $ppdbs->links() }}
    </div>
</div>
@endsection
