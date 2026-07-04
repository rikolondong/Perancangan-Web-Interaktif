readme_content_v2 = """# WebsiteCRUD - Sistem Pengelolaan Data Mahasiswa

Aplikasi web sederhana untuk melakukan operasi **CRUD (Create, Read, Update, Delete)** Data Mahasiswa. Proyek ini dibangun menggunakan **PHP Native** dan **MySQL** sebagai backend, serta dipercantik menggunakan **Bootstrap 5**, **Google Fonts (Poppins)**, dan **FontAwesome** untuk menghasilkan antarmuka pengguna (UI) yang modern, bersih, dan responsif.

Panduan instalasi di bawah ini disusun sepenuhnya menggunakan metode **GUI / Grafis (Tanpa Terminal)** sehingga sangat mudah diikuti oleh siapa saja.

## 🚀 Fitur Utama
- **Create**: Menambahkan data mahasiswa baru melalui form yang interaktif.
- **Read**: Menampilkan daftar mahasiswa dalam bentuk tabel modern dengan efek hover.
- **Update**: Mengubah informasi mahasiswa yang sudah ada dengan validasi form.
- **Delete**: Menghapus data mahasiswa dengan konfirmasi pop-up yang aman.
- **Search**: Fitur pencarian cepat berdasarkan **Nama** atau **NIM** secara langsung.
- **Desain Modern**: Menggunakan komponen kartu (*card*), bayangan lembut (*subtle shadow*), serta sepenuhnya responsif di berbagai ukuran layar.

---

## 🛠️ Prasyarat (Prerequisites)
Sebelum menjalankan proyek ini, pastikan komputer Anda sudah terinstal:
- **XAMPP** (Aplikasi panel kontrol untuk menjalankan server lokal Apache & MySQL)
- **Browser Web** (Google Chrome, Microsoft Edge, Mozilla Firefox, atau sejenisnya)

---

## 📦 Tahap Instalasi & Konfigurasi (Tanpa Terminal)

Ikuti langkah-langkah berikut secara berurutan untuk menjalankan proyek di komputer lokal Anda:

### 1. Menyiapkan Folder Proyek
1. Unduh (*download*) proyek ini dari GitHub dengan cara mengklik tombol hijau bertuliskan **Code** di bagian kanan atas halaman ini, lalu pilih **Download ZIP**.
2. Buka folder unduhan di komputer Anda, lalu **Ekstrak** (Extract) file ZIP tersebut.
3. Pastikan nama folder hasil ekstrak diubah menjadi **`WebsiteCRUD`** (perhatikan besar kecil hurufnya).
4. Salin (*copy*) folder **`WebsiteCRUD`** tersebut, lalu pindahkan (*paste*) ke dalam direktori *htdocs* XAMPP Anda.
   - Jalur default di Windows: `C:\\xampp\\htdocs\\`
   - Pastikan letak akhirnya terstruktur seperti ini: `C:\\xampp\\htdocs\\WebsiteCRUD`

### 2. Mengaktifkan Server Lokal (XAMPP)
1. Buka aplikasi **XAMPP Control Panel** (bisa dicari melalui menu Start/Pencarian Windows).
2. Pada baris **Apache**, klik tombol **Start**.
3. Pada baris **MySQL**, klik tombol **Start**.
4. Pastikan teks *Apache* dan *MySQL* berubah warna menjadi latar belakang hijau yang menandakan server lokal telah aktif.

### 3. Konfigurasi Database Melalui phpMyAdmin
1. Buka browser web Anda, lalu ketik URL berikut pada address bar: **`http://localhost/phpmyadmin`** dan tekan **Enter**.
2. Klik menu **Baru** (atau **New**) yang berada di panel sebelah kiri untuk membuat database baru.
3. Masukkan nama database: **`db_kampus`**, lalu klik tombol **Buat** (atau **Create**).
4. Klik nama database **`db_kampus`** yang baru saja Anda buat pada panel sebelah kiri.
5. Klik tab **SQL** pada barisan menu bagian atas.
6. Salin (*copy*) seluruh perintah SQL di bawah ini, lalu tempel (*paste*) ke dalam kotak teks SQL yang tersedia:

```sql
CREATE TABLE mahasiswa (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jurusan VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL
);

INSERT INTO mahasiswa (nim, nama, jurusan, email) VALUES
('20262001', 'Budi Santoso', 'Teknik Mesin', 'budi.sans@kampus.ac.id'),
('20263015', 'Siti Aminah', 'Kedokteran Gigi', 'siti.aminah@kampus.ac.id'),
('20264055', 'Andi Wijaya', 'Ilmu Hukum', 'andi.wijaya@kampus.ac.id'),
('20265102', 'Ratna Sari', 'Sastra Inggris', 'ratna.sari@kampus.ac.id'),
('20266220', 'Hendra Pratama', 'Agribisnis', 'hendra.pratama@kampus.ac.id');
