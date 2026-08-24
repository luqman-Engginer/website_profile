<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\User\PpdbController;

// 1. PUBLIC ROUTES (Dapat diakses oleh Pengunjung/Guest/User)
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/gallery', [PublicController::class, 'gallery'])->name('gallery');

// Route Kontak (GET & POST)
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'storeContact'])->name('contact.store');

// 2. GUEST ONLY ROUTES (Khusus yang BELUM login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// 3. AUTHENTICATED ROUTES (Khusus pengguna yang SUDAH login)
Route::middleware('auth')->group(function () {

    // Route Logout (Akses umum untuk User & Admin)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ==========================================
    // AREA KHUSUS USER (TERPISAH DARI PUBLIC & ADMIN)
    // ==========================================
    Route::prefix('user')->name('user.')->group(function () {
        // Dashboard Siswa & Profil User
        Route::get('/dashboard', [UserDashboard::class, 'index'])->name('dashboard');
        Route::get('/profile', [UserDashboard::class, 'profile'])->name('profile');
        Route::put('/profile', [UserDashboard::class, 'updateProfile'])->name('profile.update');

        // Pendaftaran PPDB User
        Route::get('/ppdb', [PpdbController::class, 'index'])->name('ppdb');
        Route::post('/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');
    });

    // ==========================================
    // AREA KHUSUS ADMIN PANEL (Middleware 'admin')
    // ==========================================
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

        // CRUD Management
        Route::resource('users', UserController::class);
        Route::resource('galleries', GalleryController::class);

        // Management PPDB Admin
        Route::get('/ppdb', [AdminPpdbController::class, 'index'])->name('ppdb.index');
        Route::get('/ppdb/{id}', [AdminPpdbController::class, 'show'])->name('ppdb.show');

        // Rute untuk Update Status (Mendukung nama 'admin.ppdb.update' dan 'admin.ppdb.update-status')
        Route::put('/ppdb/{id}', [AdminPpdbController::class, 'update'])->name('ppdb.update');
        Route::patch('/ppdb/{id}/status', [AdminPpdbController::class, 'updateStatus'])->name('ppdb.update-status');

        Route::delete('/ppdb/{id}', [AdminPpdbController::class, 'destroy'])->name('ppdb.destroy');

        // Settings Profil Sekolah
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    });

});
