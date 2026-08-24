<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online - School Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7fa; color: #2b3445; }
        .navbar-modern { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); box-shadow: 0 4px 20px rgba(0,0,0,0.03); }
        .bg-gradient-primary { background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%); color: white; }
        .card-modern { border: none; border-radius: 20px; background: #ffffff; box-shadow: 0 10px 30px rgba(0,0,0,0.03); transition: all 0.3s ease; }
        .card-modern:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(0,0,0,0.07); }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-modern py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark d-flex align-items-center gap-2" href="{{ route('home') }}">
                <div class="bg-gradient-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                    <i class="fa-solid fa-graduation-cap fs-6"></i>
                </div>
                <span>SMK Imaginatic</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2">
                    <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'text-primary' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('about') ? 'text-primary' : '' }}" href="{{ route('about') }}">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('gallery') ? 'text-primary' : '' }}" href="{{ route('gallery') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold {{ request()->routeIs('contact') ? 'text-primary' : '' }}" href="{{ route('contact') }}">Kontak</a></li>
                </ul>
                <div class="d-flex gap-2 ms-lg-3 mt-3 mt-lg-0">
                    @auth
                        <a href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-4 fw-semibold shadow-sm">
                            <i class="fa-solid fa-gauge me-1"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light text-primary rounded-pill px-4 fw-semibold">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-primary bg-gradient-primary border-0 rounded-pill px-4 fw-semibold shadow-sm">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-top py-4 mt-5">
        <div class="container text-center text-muted small">
            <p class="m-0">&copy; 2026 SMK Imaginatic. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
