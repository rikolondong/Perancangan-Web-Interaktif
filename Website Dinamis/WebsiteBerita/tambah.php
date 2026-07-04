<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $ringkasan = mysqli_real_escape_string($conn, $_POST['ringkasan']);
    $konten = mysqli_real_escape_string($conn, $_POST['konten']);
    $gambar = mysqli_real_escape_string($conn, $_POST['gambar']);

    $query = "INSERT INTO artikel (judul, ringkasan, konten, gambar) VALUES ('$judul', '$ringkasan', '$konten', '$gambar')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 py-10 px-4">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
        <h2 class="text-2xl font-bold mb-6 text-gray-900">Tambah Artikel Baru</h2>
        
        <form action="" method="POST" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
                <input type="text" name="judul" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ringkasan Singkat</label>
                <textarea name="ringkasan" rows="2" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Isi Konten Berita</label>
                <textarea name="konten" rows="6" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">URL Link Gambar</label>
                <input type="text" name="gambar" placeholder="https://example.com/image.jpg" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <div class="flex space-x-3 pt-4">
                <button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2.5 rounded-xl transition-colors">Simpan Artikel</button>
                <a href="dashboard.php" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-2.5 rounded-xl transition-colors">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>