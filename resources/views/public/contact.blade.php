@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card-modern p-4 p-md-5 h-100">
                <h4 class="fw-bold text-dark mb-4">Hubungi Kami</h4>
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
                        <i class="fa-solid fa-location-dot fs-5"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Alamat</small>
                        <span class="fw-semibold text-dark">{{ $setting->address ?? 'Bekasi, Jawa Barat' }}</span>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
                        <i class="fa-solid fa-envelope fs-5"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Email</small>
                        <span class="fw-semibold text-dark">{{ $setting->email ?? 'info@sekolah.sch.id' }}</span>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
                        <i class="fa-solid fa-phone fs-5"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Telepon</small>
                        <span class="fw-semibold text-dark">{{ $setting->phone ?? '081234567890' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card-modern p-4 p-md-5">
                <h4 class="fw-bold text-dark mb-4">Kirim Pesan</h4>

                @if(session('success'))
                    <div class="alert alert-success border-0 rounded-3 py-2 px-3 small mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control rounded-3" placeholder="Masukkan nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control rounded-3" placeholder="email@domain.com" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Pesan</label>
                        <textarea name="message" class="form-control rounded-3" rows="4" placeholder="Tuliskan pertanyaan Anda..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-5 py-3 fw-bold shadow-sm">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
