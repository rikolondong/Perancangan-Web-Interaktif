<?php
include 'koneksi.php';
session_start();

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center antialiased">

    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-gray-100">
        <div class="text-center mb-8">
            <span class="font-bold text-3xl tracking-tighter text-blue-600">Admin<span class="text-gray-900">Panel</span></span>
            <p class="text-gray-400 mt-2 text-sm">Masuk untuk mengelola artikel berita</p>
        </div>

        <?php if (isset($error)) : ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-3 mb-4 rounded text-sm">
                Username atau password salah!
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
            </div>
            <button type="submit" name="login" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-xl transition-colors shadow-lg shadow-blue-500/20">
                Sign In
            </button>
        </form>
    </div>

</body>
</html>