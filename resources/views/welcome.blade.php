<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Portal Sekolah') }}</title>

    <!-- Tailwind CSS / Vite -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen flex flex-col justify-between p-6 lg:p-8">

    <!-- HEADER / NAVIGATION -->
    <header class="w-full max-w-6xl mx-auto flex justify-between items-center py-4">
        <h1 class="fw-bold font-semibold text-lg">{{ config('app.name', 'Portal Sekolah') }}</h1>
        @if (Route::has('login'))
            <nav class="flex gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 border rounded-md dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 border border-transparent rounded-md hover:border-gray-300 dark:hover:border-gray-700 transition">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 border rounded-md dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <!-- MAIN HERO SECTION -->
    <main class="w-full max-w-4xl mx-auto my-auto text-center py-12">
        <span class="text-xs uppercase tracking-wider text-gray-500 font-semibold mb-2 block">Portal Informasi & Layanan</span>
        <h2 class="text-3xl lg:text-5xl font-bold mb-4">Selamat Datang di Portal Resmi</h2>
        <p class="text-gray-600 dark:text-gray-400 max-w-xl mx-auto mb-8">
            Akses informasi sekolah, galeri kegiatan, serta layanan akademik pengguna secara praktis melalui panel ini.
        </p>

        <div class="flex justify-center gap-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-black dark:bg-white text-white dark:text-black font-medium rounded-md shadow hover:opacity-90 transition">
                    Buka Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="px-6 py-3 bg-black dark:bg-white text-white dark:text-black font-medium rounded-md shadow hover:opacity-90 transition">
                    Masuk Akun
                </a>
            @endauth
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="w-full max-w-6xl mx-auto text-center text-xs text-gray-500 py-4">
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </footer>

</body>
</html>
