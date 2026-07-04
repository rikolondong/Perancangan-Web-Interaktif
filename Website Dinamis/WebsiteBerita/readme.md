# NewsPortal - Website Berita Dinamis (PHP & MySQL)

NewsPortal adalah sebuah sistem manajemen konten (CMS) sederhana untuk portal berita yang dibangun menggunakan **PHP Native** dan **MySQL**. Proyek ini menggunakan **Tailwind CSS** untuk menghasilkan antarmuka pengguna (UI) yang modern, bersih, dan responsif (*mobile-friendly*) dengan mengadopsi gaya desain *Bento Grid*.

## ✨ Fitur Utama
* **Halaman Beranda Dinamis:** Menampilkan daftar artikel terbaru dengan *highlight* pada berita utama.
* **Halaman Baca Artikel:** Menampilkan konten utuh dari berita yang dipilih dengan tipografi yang nyaman dibaca.
* **Dashboard Admin Terproteksi:** Sistem login sederhana (menggunakan session dan password hashing bcrypt) untuk mengamankan halaman pengelolaan data.
* **CRUD Penuh (Create, Read, Update, Delete):** Admin dapat menambah, melihat, mengedit, dan menghapus artikel langsung dari Dashboard.
* **Desain Responsif:** Tampilan otomatis menyesuaikan dengan ukuran layar (HP, Tablet, Desktop) berkat Tailwind CSS via CDN.

---

## 🛠️ Prasyarat (Kebutuhan Sistem)
Sebelum menjalankan proyek ini, pastikan komputer Anda sudah terinstal:
1. **XAMPP** (untuk menjalankan server Apache dan database MySQL).
2. **Web Browser** (Chrome, Firefox, Edge, atau Safari).
3. **Koneksi Internet** (hanya diperlukan untuk memuat file Tailwind CSS dari CDN).

---

## 🚀 Panduan Instalasi (Tanpa Terminal)

Ikuti langkah-langkah di bawah ini secara berurutan untuk menjalankan proyek ini di komputer lokal Anda:

### Langkah 1: Unduh Proyek (Download ZIP)
1. Pada halaman GitHub repositori ini, klik tombol hijau bertuliskan **Code** (di bagian kanan atas daftar file).
2. Pilih **Download ZIP**.
3. Tunggu hingga proses unduhan selesai.
4. Buka folder *Downloads* di komputer Anda, klik kanan pada file ZIP tersebut, lalu pilih **Extract All...** (atau Ekstrak di sini).
5. Ubah nama folder hasil ekstraksi menjadi **`portal-berita`**.

### Langkah 2: Pindahkan ke Folder XAMPP
1. *Copy* (salin) atau *Cut* (potong) folder **`portal-berita`** tersebut.
2. Buka *File Explorer* dan navigasikan ke direktori instalasi XAMPP Anda, biasanya berada di: `C:\xampp\htdocs\`
3. *Paste* (tempel) folder **`portal-berita`** ke dalam folder `htdocs` tersebut.

### Langkah 3: Aktifkan Server XAMPP
1. Buka aplikasi **XAMPP Control Panel** di komputer Anda.
2. Klik tombol **Start** pada modul **Apache**.
3. Klik tombol **Start** pada modul **MySQL**.
4. Pastikan tulisan Apache dan MySQL berlatar belakang warna hijau, yang menandakan server sudah berjalan.

### Langkah 4: Persiapan Database via phpMyAdmin
1. Buka web browser Anda, lalu ketik alamat ini di *address bar*: `http://localhost/phpmyadmin`
2. Pada menu di sebelah kiri, klik tulisan **New** untuk membuat database baru.
3. Masukkan nama database: **`db_berita`**, lalu klik tombol **Create** (Buat).
4. Klik database `db_berita` yang baru saja dibuat di menu sebelah kiri.
5. Di bagian atas halaman, klik tab **SQL**.
6. Salin (copy) seluruh kode SQL di bawah ini, lalu tempel (paste) ke dalam kotak teks putih yang tersedia di phpMyAdmin:

```sql
CREATE TABLE artikel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    ringkasan TEXT NOT NULL,
    konten TEXT NOT NULL,
    gambar VARCHAR(255) NOT NULL,
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

INSERT INTO artikel (judul, ringkasan, konten, gambar) VALUES 
('Analisis Performa SDN Multi-Controller', 'Studi terbaru menunjukkan optimasi delay pada arsitektur Software-Defined Networking.', 'Isi lengkap berita...', '[https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=800&q=80](https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=800&q=80)'),
('Tren Bento Grid dalam UI/UX Web', 'Layout asimetris bergaya bento semakin populer.', 'Isi lengkap berita...', '[https://images.unsplash.com/photo-1561070791-2526d30994b5?auto=format&fit=crop&w=800&q=80](https://images.unsplash.com/photo-1561070791-2526d30994b5?auto=format&fit=crop&w=800&q=80)');
```


### Langkah 5: Jalankan Website

Website Anda kini sudah siap digunakan!

    Untuk melihat Halaman Utama Portal Berita: Buka browser dan akses http://localhost/portal-berita/

    Untuk masuk ke Dashboard Admin: Buka http://localhost/portal-berita/login.php

Kredensial Login Default:

    Username: admin

    Password: password

📁 Struktur File & Folder

Penjelasan singkat mengenai peran masing-masing file dalam proyek ini:

    koneksi.php : File jembatan yang menyambungkan bahasa PHP dengan database MySQL.

    index.php : Halaman depan (homepage) publik yang menampilkan grid daftar seluruh berita.

    baca.php : Halaman dinamis untuk membaca isi teks lengkap dari satu artikel spesifik.

    login.php : Halaman antarmuka masuk untuk admin (dilindungi session).

    dashboard.php : Panel kontrol utama admin untuk melihat daftar berita dalam format tabel.

    tambah.php : Halaman berisi form untuk menerbitkan berita baru (Create).

    edit.php : Halaman berisi form untuk mengubah data berita yang sudah ada (Update).

    hapus.php : File proses (tanpa tampilan) untuk menghapus data dari database secara permanen (Delete).

    logout.php : File proses untuk mengakhiri sesi login admin secara aman.

🛡️ Catatan Keamanan

Proyek ini dibuat untuk tujuan pembelajaran (educational purpose). Untuk penggunaan pada production (server hosting publik yang sebenarnya), sangat disarankan untuk menerapkan sistem Prepared Statements (PDO/MySQLi) guna mencegah serangan SQL Injection, serta memindahkan lokasi unggahan gambar (saat ini menggunakan URL) ke penyimpanan lokal yang terproteksi.
