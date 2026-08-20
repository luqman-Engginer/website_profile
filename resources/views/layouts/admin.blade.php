<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Portal Sekolah</title>

    <!-- Bootstrap 5 CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .w-20px { width: 20px; text-align: center; }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            color: #4b5563;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background-color: #e0e7ff;
            color: #4338ca;
        }
    </style>
</head>
<body class="bg-light">

    <div class="d-flex min-vh-100">
        <!-- SIDEBAR -->
        <aside class="bg-white border-end p-3" style="width: 260px;">
            <div class="d-flex align-items-center gap-2 mb-4 px-2">
                <i class="fa-solid fa-graduation-cap text-primary fs-3"></i>
                <span class="fw-bold fs-5 text-dark">Admin Panel</span>
            </div>

            <ul class="list-unstyled d-flex flex-column gap-1">
                <!-- DASHBOARD -->
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-line w-20px"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- MENU PENGGUNA -->
                <li>
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users w-20px"></i>
                        <span>Kelola Pengguna</span>
                    </a>
                </li>

                <li class="px-3 pb-2 pt-3 text-uppercase small text-muted fw-bold" style="font-size: 0.7rem;">Konten Kontrol</li>

                <!-- MENU PROFIL SEKOLAH (Menggunakan route admin.settings.*) -->
                <li>
                    <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-school w-20px"></i>
                        <span>Profil Sekolah</span>
                    </a>
                </li>

                <!-- MENU GALERI SEKOLAH (Menggunakan route admin.galleries.*) -->
                <li>
                    <a href="{{ route('admin.galleries.index') }}" class="sidebar-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-images w-20px"></i>
                        <span>Galeri Sekolah</span>
                    </a>
                </li>

                <li class="my-3 border-top"></li>

                <!-- LOGOUT -->
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="sidebar-link text-danger w-100 border-0 bg-transparent text-start">
                            <i class="fa-solid fa-right-from-bracket w-20px"></i>
                            <span>Keluar</span>
                        </button>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- MAIN CONTENT AREA -->
        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
