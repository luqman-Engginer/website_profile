@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <!-- Informasi Kontak, Alamat, Sosial Media & Maps -->
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

                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
                        <i class="fa-solid fa-phone fs-5"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Telepon</small>
                        <span class="fw-semibold text-dark">{{ $setting->phone ?? '081234567890' }}</span>
                    </div>
                </div>

                <!-- Social Media (Logo Instagram) -->
                @if(!empty($setting->social_media))
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
                        <i class="fa-brands fa-instagram fs-5"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Instagram</small>
                        <a href="{{ $setting->social_media }}" target="_blank" class="fw-semibold text-primary text-decoration-none">
                            Kunjungi Instagram Sekolah &rarr;
                        </a>
                    </div>
                </div>
                @endif

                <!-- Google Maps Embed / Otomatis Tampil Peta -->
                @if(!empty($setting->map_link))
                <div class="mt-4 pt-3 border-top">
                    <small class="text-muted d-block mb-2 fw-semibold">Peta Lokasi Sekolah</small>
                    <div class="rounded-3 overflow-hidden border w-100 position-relative shadow-sm" style="height: 240px;">
                        @if(str_contains($setting->map_link, '<iframe'))
                            {!! $setting->map_link !!}
                        @else
                            <!-- Jika di admin hanya isi link biasa, kita tampilkan map embed pencarian berdasarkan alamat atau tombol interaktif -->
                            <iframe
                                width="100%"
                                height="100%"
                                style="border:0;"
                                loading="lazy"
                                allowfullscreen
                                src="https://maps.google.com/maps?q={{ urlencode($setting->address ?? 'Bekasi') }}&t=&z=15&ie=UTF8&iwloc=&output=embed">
                            </iframe>
                        @endif
                    </div>
                    <div class="mt-2 text-end">
                        <a href="{{ str_contains($setting->map_link, '<iframe') ? '#' : $setting->map_link }}" target="_blank" class="small text-decoration-none text-primary fw-semibold">
                            <i class="fa-solid fa-external-link-alt me-1"></i> Perbesar Peta di Google Maps
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Formulir Kirim Pesan -->
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
