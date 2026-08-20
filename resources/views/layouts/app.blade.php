<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $globalSetting->school_name ?? 'Portal Sekolah' }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #334155;
        }

        .nav-link-public {
            color: #475569 !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 1rem !important;
            border-radius: 0.5rem;
            transition: all 0.2s ease-in-out;
        }

        .nav-link-public:hover {
            color: #2563eb !important;
            background-color: #eff6ff;
        }

        .nav-link-public.active {
            color: #2563eb !important;
            font-weight: 700;
            background-color: #eff6ff;
        }

        .footer-dark {
            background: linear-gradient(180deg, #0f172a 0%, #0b1329 100%);
        }

        /* Menghilangkan garis border-top pada layar desktop */
        @media (min-width: 992px) {
            .border-lg-none {
                border-top: none !important;
                padding-top: 0 !important;
            }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR PUBLIC -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm py-3 sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-primary" href="{{ url('/') }}">
                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="fa-solid fa-graduation-cap fs-5"></i>
                </div>
                <span class="fs-5 text-dark fw-bold tracking-tight">{{ $globalSetting->school_name ?? 'Portal Sekolah' }}</span>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#publicNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="publicNavbar">
                <ul class="navbar-nav mx-auto gap-1 my-3 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-public {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-public {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-public {{ request()->is('gallery') ? 'active' : '' }}" href="{{ url('/gallery') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-public {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Kontak</a>
                    </li>
                </ul>

                @auth
                    <!-- STATE: JIKA SUDAH LOGIN -->
                    <div class="d-flex align-items-center gap-2 border-lg-none">
                        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
                            <i class="fa-solid fa-gauge me-1"></i> Dashboard
                        </a>

                        <form action="{{ route('logout') }}" method="POST" class="d-inline m-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger rounded-pill px-3 fw-semibold d-flex align-items-center gap-1.5">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                @else
                    <!-- STATE: JIKA BELUM LOGIN -->
                    <div class="d-flex align-items-center gap-2 border-lg-none">
                        <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
                            <i class="fa-solid fa-right-to-bracket me-1"></i> Masuk
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="text-white footer-dark py-5 mt-auto border-top border-secondary border-opacity-10">
        <div class="container">
            <div class="row gy-4 justify-content-between">
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="bg-primary text-white rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <h5 class="fw-bold text-white mb-0">{{ $globalSetting->school_name ?? 'SMK 73' }}</h5>
                    </div>
                    <p class="text-white-50 small mb-3" style="line-height: 1.6;">
                        Portal resmi sistem informasi & dokumentasi kegiatan sekolah. Menyediakan akses data terintegrasi dan transparan.
                    </p>
                    <p class="text-white-50 small mb-0 d-inline-flex align-items-center gap-2">
                        <i class="fa-solid fa-location-dot text-primary"></i>
                        <span>{{ $globalSetting->location ?? 'Jl. Kalimusada, Bekasi' }}</span>
                    </p>
                </div>

                <div class="col-lg-4 text-lg-end">
                    <h6 class="fw-bold text-white mb-3">Hubungi Layanan</h6>
                    <p class="text-white-50 small mb-2 d-inline-flex align-items-center gap-2">
                        <i class="fa-brands fa-whatsapp text-success fs-5"></i>
                        <span class="fs-6 fw-semibold text-white">{{ $globalSetting->contact_number ?? '081234567890' }}</span>
                    </p>
                    <div class="text-white-50 small">Hari Kerja: Senin - Jumat (07:00 - 15:30 WIB)</div>
                </div>
            </div>

            <hr class="border-secondary my-4 opacity-20">

            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-2 text-white-50 small">
                <div>&copy; {{ date('Y') }} {{ $globalSetting->school_name ?? 'Portal Sekolah' }}. Hak Cipta Dilindungi.</div>
                <div>Dikembangkan dengan Laravel & Bootstrap 5</div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
