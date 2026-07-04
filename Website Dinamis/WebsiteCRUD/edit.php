<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$row = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; padding-top: 50px; }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-top: 5px solid #ffc107; }
        .form-control { border-radius: 8px; padding: 12px; }
        .form-control:focus { box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25); border-color: #ffc107; }
        .btn-custom { border-radius: 8px; font-weight: 500; padding: 10px; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-custom p-4">
                <div class="card-body">
                    <h3 class="mb-4 text-center fw-semibold" style="color: #2b3452;">Update Data</h3>
                    
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        
                        <div class="mb-3">
                            <label class="form-label fw-medium text-muted">NIM</label>
                            <input type="text" name="nim" class="form-control" value="<?php echo $row['nim']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium text-muted">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-muted">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" value="<?php echo $row['jurusan']; ?>" required>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <label class="form-label fw-medium text-muted">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="index.php" class="btn btn-light btn-custom me-md-2 text-muted border"><i class="fa-solid fa-arrow-left me-1"></i> Batal</a>
                            <button type="submit" name="update" class="btn btn-warning btn-custom px-4 text-dark"><i class="fa-solid fa-check-double me-1"></i> Perbarui Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id']; $nim = $_POST['nim']; $nama = $_POST['nama']; $jurusan = $_POST['jurusan']; $email = $_POST['email'];
    $query = mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan', email='$email' WHERE id='$id'");
    if ($query) {
        echo "<script>alert('Update sukses!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data.');</script>";
    }
}
?>
</body>
</html>