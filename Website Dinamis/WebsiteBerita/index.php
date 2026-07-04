<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Efek transisi halus untuk interaksi hover */
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans text-gray-800 antialiased">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <span class="font-bold text-2xl tracking-tighter text-blue-600">News<span class="text-gray-900">Portal</span></span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-900 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Terkini</a>
                    <a href="#" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Teknologi</a>
                    <a href="#" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Gaya Hidup</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="mb-8 border-l-4 border-blue-600 pl-4">
            <h1 class="text-3xl font-bold text-gray-900">Artikel Terkini</h1>
            <p class="text-gray-500 mt-1">Informasi terbaru hari ini untuk Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[300px]">
            <?php
            // Mengambil data berita dari database
            $query = "SELECT * FROM artikel ORDER BY id ASC";
            $result = mysqli_query($conn, $query);
            $count = 0;

            while($row = mysqli_fetch_assoc($result)) {
                // Berita pertama mengambil 2 kolom dan 2 baris (Highlight)
                $gridClass = ($count == 0) ? 'md:col-span-2 md:row-span-2' : 'col-span-1 row-span-1';
                $titleClass = ($count == 0) ? 'text-3xl' : 'text-xl';
                $date = date('d M Y', strtotime($row['tanggal']));
                ?>

                <article class="relative rounded-2xl overflow-hidden shadow-sm card-hover bg-white group <?php echo $gridClass; ?>">
                    <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
                    
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <span class="inline-block px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full mb-3 uppercase tracking-wide">Update</span>
                        <h2 class="font-bold text-white mb-2 leading-tight <?php echo $titleClass; ?>">
                            <a href="baca.php?id=<?php echo $row['id']; ?>" class="hover:underline"><?php echo $row['judul']; ?></a>
                        </h2>
                        
                        <?php if($count == 0): // Tampilkan ringkasan hanya di berita utama ?>
                            <p class="text-gray-200 line-clamp-2 mb-3"><?php echo $row['ringkasan']; ?></p>
                        <?php endif; ?>
                        
                        <div class="flex items-center text-gray-300 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <?php echo $date; ?>
                        </div>
                    </div>
                </article>

                <?php 
                $count++;
            } 
            ?>
        </div>
    </main>

</body>
</html>