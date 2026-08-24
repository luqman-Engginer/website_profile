<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - PPDB System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; color: #1e293b; }

        /* SIDEBAR */
        .sidebar { width: 260px; min-height: 100vh; background: #0f172a; color: #94a3b8; position: fixed; top: 0; left: 0; z-index: 100; border-right: 1px solid rgba(255,255,255,0.05); }
        .sidebar .nav-link { color: #94a3b8; padding: 12px 20px; border-radius: 12px; margin-bottom: 6px; font-weight: 500; transition: all 0.2s ease; }
        .sidebar .nav-link:hover { background: rgba(99, 102, 241, 0.15); color: #ffffff; }
        .sidebar .nav-link.active { background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%); color: #ffffff; box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3); }
        .sidebar .nav-link i { width: 25px; }

        .main-content { margin-left: 260px; padding: 40px; }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%) !important;
            color: white !important;
        }

        .card-modern { border: none; border-radius: 16px; background: #ffffff; box-shadow: 0 4px 20px rgba(0,0,0,0.03); transition: transform 0.2s; }
        .card-modern:hover { transform: translateY(-2px); }

        @media (max-width: 991.98px) {
            .sidebar { margin-left: -260px; transition: all 0.3s; }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR ADMIN -->
    <div class="sidebar p-3 d-flex flex-column justify-content-between">
        <div>
            <div class="d-flex align-items-center gap-3 px-2 py-3 mb-4 border-bottom border-secondary border-opacity-10">
                <div class="bg-gradient-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;">
                    <i class="fa-solid fa-user-shield fs-5"></i>
                </div>
                <div>
                    <span class="fw-bold text-white d-block fs-6" style="line-height: 1.2;">Admin Panel</span>
                    <span class="d-block" style="font-size: 11px; color: #94a3b8;">Portal PPDB Online</span>
                </div>
            </div>

            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-pie me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.ppdb.index') }}" class="nav-link {{ request()->routeIs('admin.ppdb.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-id-card me-2"></i> Kelola PPDB
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users me-2"></i> Data Users
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.galleries.index') }}" class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-images me-2"></i> Galeri
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-gear me-2"></i> Pengaturan
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <hr class="border-secondary border-opacity-10">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100 rounded-pill py-2 fw-semibold shadow-sm d-flex align-items-center justify-content-center gap-2">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
