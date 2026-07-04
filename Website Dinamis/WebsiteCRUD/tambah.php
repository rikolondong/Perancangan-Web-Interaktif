<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; padding-top: 50px; }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .form-control { border-radius: 8px; padding: 12px; }
        .form-control:focus { box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15); border-color: #86b7fe; }
        .btn-custom { border-radius: 8px; font-weight: 500; padding: 10px; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-custom p-4">
                <div class="card-body">
                    <h3 class="mb-4 text-center fw-semibold" style="color: #2b3452;">Tambah Data Baru</h3>
                    
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label fw-medium text-muted">Nomor Induk Mahasiswa (NIM)</label>
                            <input type="text" name="nim" class="form-control bg-light" placeholder="Masukkan NIM..." required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium text-muted">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control bg-light" placeholder="Masukkan nama lengkap..." required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-muted">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control bg-light" placeholder="Contoh: Sistem Informasi" required>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <label class="form-label fw-medium text-muted">Email Kampus</label>
                                <input type="email" name="email" class="form-control bg-light" placeholder="nama@kampus.ac.id" required>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="index.php" class="btn btn-light btn-custom me-md-2 text-muted border"><i class="fa-solid fa-arrow-left me-1"></i> Batal</a>
                            <button type="submit" name="submit" class="btn btn-primary btn-custom px-4"><i class="fa-solid fa-floppy-disk me-1"></i> Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    include 'koneksi.php';
    $nim = $_POST['nim']; $nama = $_POST['nama']; $jurusan = $_POST['jurusan']; $email = $_POST['email'];
    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, jurusan, email) VALUES ('$nim', '$nama', '$jurusan', '$email')");
    if ($query) {
        echo "<script>alert('Berhasil! Data telah ditambahkan.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Ups! Gagal menambahkan data.');</script>";
    }
}
?>
</body>
</html>