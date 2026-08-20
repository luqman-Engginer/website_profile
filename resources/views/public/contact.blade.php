@extends('layouts.app')

@section('content')
<!-- HERO HEADER -->
<section class="py-5 text-white text-center" style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);">
    <div class="container py-4">
        <span class="badge bg-info bg-opacity-10 text-info px-3 py-2 rounded-pill mb-3 fw-semibold border border-info border-opacity-25">
            Hubungi Kami
        </span>
        <h1 class="display-5 fw-bold text-white mb-2">Kontak & Lokasi</h1>
        <p class="lead text-white-50 mx-auto mb-0" style="max-width: 600px;">
            Kami siap melayani pertanyaan dan informasi terkait pendaftaran serta kegiatan sekolah.
        </p>
    </div>
</section>

<!-- KONTEN UTAMA CONTACT -->
<section class="py-5 bg-light">
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="p-4 p-md-5 rounded-4 bg-white shadow-sm border">
                    <h4 class="fw-bold text-dark mb-4 text-center">Informasi Kontak Sekolah</h4>

                    <!-- Item Alamat -->
                    <div class="d-flex align-items-start gap-3 mb-3 p-3 bg-light rounded-3 border">
                        <div class="p-3 bg-primary bg-opacity-10 text-primary rounded-3 flex-shrink-0">
                            <i class="fa-solid fa-location-dot fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="fw-bold text-dark mb-1">Alamat Resmi</h6>
                            <p class="text-muted small mb-0">
                                {{ $globalSetting->location ?? 'Alamat belum diatur di menu Settings Admin.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Item WhatsApp -->
                    <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-3 border">
                        <div class="p-3 bg-success bg-opacity-10 text-success rounded-3 flex-shrink-0">
                            <i class="fa-brands fa-whatsapp fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="fw-bold text-dark mb-1">Telepon / WhatsApp</h6>
                            <p class="text-muted small mb-2">
                                {{ $globalSetting->contact_number ?? 'Kontak belum diatur.' }}
                            </p>
                            @if(!empty($globalSetting->contact_number))
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $globalSetting->contact_number) }}" target="_blank" class="btn btn-sm btn-success rounded-pill px-3 fw-semibold shadow-sm">
                                    <i class="fa-brands fa-whatsapp me-1"></i> Hubungi via WhatsApp
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
