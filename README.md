# Pelatihan-2
# Sistem Pendaftaran Siswa & Dashboard Admin (Pelatihan 2)

Aplikasi web berbasis PHP dan MySQL yang dilengkapi dengan sistem autentikasi (*login/logout*) serta halaman administrator untuk melihat dan mengelola data pendaftaran siswa.

## Fitur Utama

- Autentikasi Admin: Sistem *login* dan *logout* berbasis sesi (*session*) untuk membatasi akses ke halaman pengelolaan data.
- Dashboard Administrator: Halaman khusus admin untuk memantau daftar siswa yang telah mendaftar (Nama, Alamat, TTL, dan Paket Belajar).
- Koneksi Database Terpusat: Pemisahan konfigurasi koneksi database agar lebih rapi, aman, dan mudah dikelola.

## Struktur Folder

```text
├── admin.php           # Halaman utama dashboard administrator untuk melihat/mengelola data siswa
├── login.php           # Halaman dan proses autentikasi masuk (login) admin
├── logout.php          # Skrip untuk mengakhiri sesi (logout) dan mengarahkan kembali ke halaman login
├── koneksi.php         # Konfigurasi koneksi ke database MySQL
└── database.sql        # Skrip SQL untuk struktur tabel data siswa dan akun admin
