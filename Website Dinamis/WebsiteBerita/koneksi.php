<?php
$host = "localhost";
$user = "root";
$pass = ""; // Kosongkan jika password root XAMPP default
$db   = "db_berita";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>