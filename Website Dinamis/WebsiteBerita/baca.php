<?php
include 'koneksi.php';

// Memastikan parameter ID tersedia di URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// Mengonversi ID ke integer untuk keamanan dasar (mencegah SQL Injection)
$id = intval($_GET['id']);
$query = "SELECT * FROM artikel WHERE id = $id";
$result = mysqli_query($conn, $query);

// Jika artikel dengan ID tersebut tidak ditemukan di database
if (mysqli_num_rows($result) === 0) {
    echo "<script>alert('Artikel tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

$row = mysqli_fetch_assoc($result);
$date = date('d F Y', strtotime($row['tanggal']));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['judul']; ?> - NewsPortal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800 antialiased">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="index.php" class="font-bold text-2xl tracking-tighter text-blue-600">News<span class="text-gray-900">Portal</span></a>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="index.php" class="text-gray-900 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Beranda</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="mb-6">
            <a href="index.php" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors group">
                <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>

        <header class="mb-8">
            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full mb-3 uppercase tracking-wide">
                Kategori Berita
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight leading-tight mb-4">
                <?php echo $row['judul']; ?>
            </h1>
            <div class="flex items-center text-gray-500 text-sm space-x-4">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Oleh: Editor</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-10a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span><?php echo $date; ?></span>
                </div>
            </div>
        </header>

        <div class="mb-10 rounded-2xl overflow-hidden shadow-lg bg-gray-200 aspect-[16/9]">
            <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>" class="w-full h-full object-cover">
        </div>

        <article class="text-gray-800 text-lg leading-relaxed space-y-6 max-w-none">
            <p class="font-semibold text-xl text-gray-900 border-l-4 border-blue-500 pl-4 py-1 my-6 bg-blue-50/50 rounded-r-xl">
                <?php echo $row['ringkasan']; ?>
            </p>
            
            <div class="whitespace-pre-line">
                <?php echo nl2br($row['konten']); ?>
            </div>
        </article>

    </main>

    <footer class="bg-white border-t border-gray-200 mt-20 py-8 text-center text-sm text-gray-500">
        &copy; 2026 NewsPortal. Hak Cipta Dilindungi.
    </footer>

</body>
</html>