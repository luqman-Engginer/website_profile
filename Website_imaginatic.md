<p align="center">
  <h1 align="center">PORTAL PPDB SMK MADINATUL [redacted]</h1>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13.x-red?style=for-the-badge&logo=laravel" alt="Laravel Version">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue?style=for-the-badge&logo=php" alt="PHP Version">
  <img src="https://img.shields.io/badge/Status-Active-success?style=for-the-badge" alt="Project Status">
</p>

## Tentang Project

**Portal PPDB** adalah aplikasi web berbasis Laravel yang dikembangkan untuk mengelola proses Pendaftaran Peserta Didik Baru (PPDB) di **SMK Madinatul [redacted]**. Sistem ini dirancang modern, cepat, dan memiliki sistem keamanan hak akses (*Role-Based Access Control*) yang ketat antara calon siswa (User) dan Administrator.

---

## Fitur Utama

- **Autentikasi & Registrasi Aman:**
  - Pendaftaran akun khusus untuk calon siswa (*User*) dengan validasi ketat (domain email wajib `@gmail.com`).
  - Halaman registrasi bersih tanpa pilihan *role* untuk mencegah pendaftaran admin ilegal.
- **Manajemen Role & Hak Akses Ketat:**
  - Akun **Administrator** didaftarkan secara aman melalui *Seeder* kode sistem.
  - Halaman login dilengkapi pilihan role (`User` atau `Administrator`). Sistem akan langsung menolak dan menghentikan proses (*Access Denied*) jika role yang dipilih tidak sesuai dengan data asli di database.
- **Middleware Proteksi Admin:**
  - Jalur URL khusus admin diproteksi secara ketat menggunakan *Middleware* kustom agar tidak dapat dijebol oleh user biasa.
- **Dashboard Terpisah:**
  - Dashboard khusus untuk memantau pendaftaran bagi siswa dan panel kontrol manajemen bagi admin.

---

## Teknologi yang Digunakan

- **Framework:** Laravel 13.x
- **Bahasa Pemrograman:** PHP, JavaScript
- **Frontend Styling:** Bootstrap / Modern CSS UI Layout
- **Database:** MySQL

---

## Panduan Instalasi & Menjalankan Project

Ikuti langkah-langkah di bawah ini untuk menjalankan project di komputer lokal kamu:

1. **Clone repository atau buka folder project di terminal:**
   ```bash
   git clone <url-repository-kamu>
   cd <nama-folder-project>
