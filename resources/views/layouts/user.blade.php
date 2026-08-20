<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Portal - Sekolah</title>

    <!-- Bootstrap 5 CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
        }
        .wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 260px;
            background-color: #ffffff;
            border-right: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
        }
        .main-content {
            margin-left: 260px;
            flex-grow: 1;
            padding: 2rem;
            width: calc(100% - 260px);
        }
        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            font-weight: 700;
            font-size: 1.15rem;
            color: #1e293b;
            border-bottom: 1px solid #f1f5f9;
        }
        .sidebar-menu {
            padding: 1rem 0.75rem;
            list-style: none;
            margin: 0;
            flex-grow: 1;
        }
        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.75rem 1rem;
            color: #64748b;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .nav-link-custom:hover {
            background-color: #f1f5f9;
            color: #2563eb;
        }
        .nav-link-custom.active {
            background-color: #eff6ff;
            color: #2563eb;
            font-weight: 600;
        }
        .sidebar-footer {
            padding: 1rem 0.75rem;
            border-top: 1px solid #f1f5f9;
        }
        .w-20px {
            width: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <!-- SIDEBAR USER -->
        <aside class="sidebar">
            <div class="sidebar-brand d-flex align-items-center gap-2">
                <i class="fa-solid fa-graduation-cap text-primary fs-4"></i>
                <span>Portal Siswa</span>
            </div>

            <ul class="sidebar-menu d-flex flex-column gap-1">
                <li>
                    <a href="{{ route('user.dashboard') }}" class="nav-link-custom {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-house w-20px"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.ppdb') }}" class="nav-link-custom {{ request()->routeIs('user.ppdb*') ? 'active' : '' }}">
                        <i class="fa-solid fa-file-pen w-20px"></i>
                        <span>Pendaftaran PPDB</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.profile') }}" class="nav-link-custom {{ request()->routeIs('user.profile') ? 'active' : '' }}">
                        <i class="fa-solid fa-user w-20px"></i>
                        <span>Profil Saya</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link-custom text-danger w-100 border-0 bg-transparent text-start">
                        <i class="fa-solid fa-right-from-bracket w-20px"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- KONTEN UTAMA USER -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
