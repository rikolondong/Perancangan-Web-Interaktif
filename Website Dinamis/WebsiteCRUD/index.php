<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; padding-top: 40px; }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .table > :not(caption) > * > * { padding: 1rem 1rem; vertical-align: middle; }
        .table-hover tbody tr:hover { background-color: #f8faff; transition: all 0.3s ease; }
        .btn-custom { border-radius: 8px; font-weight: 500; padding: 8px 16px; }
        .header-title { font-weight: 600; color: #2b3452; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            
            <div class="row align-items-center mb-4">
                <div class="col-md-6">
                    <h2 class="header-title mb-0"><i class="fa-solid fa-user-graduate me-2 text-primary"></i> Data Mahasiswa</h2>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <a href="tambah.php" class="btn btn-primary btn-custom shadow-sm">
                        <i class="fa-solid fa-plus me-1"></i> Tambah Data
                    </a>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <form method="GET" action="index.php">
                        <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                            <input type="text" name="cari" class="form-control border-0" placeholder="Cari NIM atau Nama Mahasiswa..." value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>">
                            <button class="btn btn-primary px-4" type="submit"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
                            <?php if(isset($_GET['cari'])): ?>
                                <a href="index.php" class="btn btn-danger px-3" title="Reset Pencarian"><i class="fa-solid fa-xmark"></i></a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card card-custom">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>NIM</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jurusan</th>
                                    <th>Email</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                
                                // Logika Pencarian
                                if (isset($_GET['cari'])) {
                                    $cari = $_GET['cari'];
                                    // Mencari berdasarkan nama ATAU nim
                                    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$cari%' OR nim LIKE '%$cari%' ORDER BY id DESC";
                                } else {
                                    // Jika tidak ada pencarian, tampilkan semua data
                                    $query = "SELECT * FROM mahasiswa ORDER BY id DESC";
                                }
                                
                                $data = mysqli_query($koneksi, $query);
                                
                                // Cek apakah data ditemukan
                                if(mysqli_num_rows($data) > 0) {
                                    while ($row = mysqli_fetch_array($data)) {
                                ?>
                                <tr>
                                    <td class="text-center fw-bold text-muted"><?php echo $no++; ?></td>
                                    <td><span class="badge bg-secondary rounded-pill px-3 py-2"><?php echo $row['nim']; ?></span></td>
                                    <td class="fw-medium text-dark"><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['jurusan']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm text-dark btn-custom" title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm btn-custom" title="Hapus" onclick="return confirm('Apakah kamu yakin ingin menghapus data <?php echo $row['nama']; ?>?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                    } 
                                } else {
                                    // Jika data tidak ditemukan
                                    echo "<tr><td colspan='6' class='text-center py-4 text-muted'><i>Data yang kamu cari tidak ditemukan.</i></td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <p class="text-center text-muted mt-4 small">&copy; 2026 Sistem Akademik V1.0</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>