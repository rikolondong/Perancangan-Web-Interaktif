<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM artikel ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

    <div class="flex h-screen overflow-hidden">
        <div class="flex-1 flex flex-col overflow-y-auto">
            <header class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center sticky top-0 z-10">
                <h1 class="text-xl font-bold text-gray-900">Dashboard Pengelolaan Berita</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600 font-medium">Halo, <?php echo $_SESSION['username']; ?></span>
                    <a href="logout.php" class="bg-red-50 hover:bg-red-100 text-red-600 px-4 py-2 rounded-xl text-sm font-medium transition-colors">Logout</a>
                </div>
            </header>

            <main class="p-8 max-w-7xl w-full mx-auto">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Daftar Artikel</h2>
                        <p class="text-sm text-gray-500">Total berita yang diterbitkan</p>
                    </div>
                    <a href="tambah.php" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-medium text-sm transition-colors shadow-md shadow-blue-500/10 flex items-center">
                        + Tambah Berita Baru
                    </a>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 text-xs font-semibold uppercase tracking-wider">
                                <th class="px-6 py-4">Gambar</th>
                                <th class="px-6 py-4">Judul Berita</th>
                                <th class="px-6 py-4">Tanggal</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm">
                            <?php while($row = mysqli_fetch_assoc($result)) : ?>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <img src="<?php echo $row['gambar']; ?>" class="w-16 h-12 object-cover rounded-lg shadow-sm">
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 max-w-xs truncate">
                                    <?php echo $row['judul']; ?>
                                </td>
                                <td class="px-6 py-4 text-gray-500">
                                    <?php echo date('d M Y', strtotime($row['tanggal'])); ?>
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-indigo-600 hover:text-indigo-900 font-medium bg-indigo-50 px-3 py-1.5 rounded-lg transition-colors">Edit</a>
                                    <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')" class="text-red-600 hover:text-red-900 font-medium bg-red-50 px-3 py-1.5 rounded-lg transition-colors">Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

</body>
</html>