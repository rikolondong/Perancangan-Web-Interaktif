<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM artikel WHERE id = $id");
header("Location: dashboard.php");
?>