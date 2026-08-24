<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Siswa - Modern Portal</title>

    <!-- Bootstrap 5 & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fa;
            color: #2b3445;
        }
        /* Sidebar User */
        .sidebar {
            background: #ffffff;
            border-right: none !important;
            box-shadow: 4px 0 24px rgba(0,0,0,0.04);
            transition: all 0.3s ease;
        }
        .nav-link {
            border-radius: 12px;
            margin-bottom: 8px;
            color: #7d879c !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            background-color: #f3f5f9;
            color: #4f46e5 !important;
            transform: translateX(5px);
        }
        .nav-link.active {
            background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }
        .nav-link i {
            width: 24px;
            text-align: center;
        }
        /* Modern Cards */
        .card-modern {
            border: none;
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            transition: all 0.3s ease;
        }
        .card-modern:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.07);
        }
        /* Gradient Accent */
        .bg-gradient-primary { background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%); color: white; }
    </style>
</head>
<body>

    <div class="d-flex">
        <!-- SIDEBAR USER -->
        <aside class="sidebar vh-100 position-fixed" style="width: 270px; z-index: 1000;">
            <div class="d-flex align-items-center justify-content-center p-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-gradient-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <span class="fw-bold text-dark fs-5">Student Portal</span>
                </div>
            </div>

            <div class="p-3">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }} px-3 py-2" href="{{ route('user.dashboard') }}">
                            <i class="fa-solid fa-house me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.ppdb') ? 'active' : '' }} px-3 py-2" href="{{ route('user.ppdb') }}">
                            <i class="fa-solid fa-file-pen me-2"></i> Form PPDB
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.profile') ? 'active' : '' }} px-3 py-2" href="{{ route('user.profile') }}">
                            <i class="fa-solid fa-user me-2"></i> Profil Saya
                        </a>
                    </li>
                </ul>

                <hr class="my-4 opacity-10">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light text-danger w-100 d-flex align-items-center justify-content-center gap-2 rounded-4 py-2" style="background: #fee2e2; border: none; font-weight: 600;">
                        <i class="fa-solid fa-power-off"></i> Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="w-100" style="margin-left: 270px; min-height: 100vh;">
            <header class="d-flex justify-content-between align-items-center p-4 bg-white sticky-top" style="box-shadow: 0 4px 20px rgba(0,0,0,0.02);">
                <h5 class="m-0 fw-bold" style="color: #2b3445;">Portal Siswa</h5>
                <div class="d-flex align-items-center gap-3">
                    <div class="text-end d-none d-md-block">
                        <p class="m-0 fw-semibold fs-6">{{ auth()->user()->name ?? 'Siswa' }}</p>
                        <small class="text-muted">Calon Siswa</small>
                    </div>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Siswa') }}&background=6366f1&color=fff&bold=true" class="rounded-circle" width="45" height="45">
                </div>
            </header>

            <div class="p-4 p-md-5">
                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
