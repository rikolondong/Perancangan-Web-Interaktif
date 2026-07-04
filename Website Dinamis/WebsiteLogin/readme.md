# Website Test Register & Login

Sebuah prototipe website uji coba autentikasi (Register & Login) fungsional yang dilengkapi dengan halaman Dashboard interaktif. Project ini dirancang menggunakan arsitektur **Single Page Application (SPA)** untuk sisi tampilan (frontend) dan ditenagai oleh **PHP & MySQL** (backend) untuk manajemen autentikasi pengguna yang aman.

Project ini mengadopsi tema *dark mode* modern berbasis *glassmorphism* dengan aksen visual *glow* kebiruan yang bersih dan estetis, terinspirasi langsung dari referensi UI terkini.

---

## 🚀 Fitur Utama

- **Halaman Login & Register Terintegrasi:** Transisi antar halaman yang mulus dan responsif.
- **Autentikasi Aman:** Password disimpan ke database menggunakan enkripsi standar industri (`PASSWORD_BCRYPT` melalui fungsi `password_hash()`).
- **Proteksi Session:** Halaman Dashboard diamankan menggunakan PHP Session. Pengguna yang belum login otomatis ditendang kembali ke halaman login.
- **Interactive Form:** Dilengkapi fitur *toggle* mata (👁️) untuk melihat atau menyembunyikan password demi kenyamanan pengguna.
- **Dashboard Dinamis:** Menyambut pengguna dengan memanggil nama asli dan username mereka secara langsung dari database setelah login berhasil.

---

## 🛠️ Prasyarat (Prerequisites)

Sebelum menjalankan project ini, pastikan Anda telah menginstal software berikut di komputer Anda:
1. **XAMPP** (versi direkomendasikan PHP 7.4 ke atas atau PHP 8.x) yang mencakup Apache Web Server dan MySQL Database.
2. Web Browser modern seperti Google Chrome, Mozilla Firefox, Microsoft Edge, atau Opera.
3. Text Editor (misalnya VS Code, Sublime Text, atau Notepad++) untuk memodifikasi kode jika diperlukan.

---

## 📋 Struktur Tabel Database

Project ini membutuhkan database bernama `db_pengguna` dengan struktur tabel `users` sebagai berikut:

```sql
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    dibuat_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
