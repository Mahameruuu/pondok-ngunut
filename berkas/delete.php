<?php
session_start();
include '../config/conn.php';

// Periksa apakah santri sudah login
if (!isset($_SESSION['santri'])) {
    header("Location: login.php");
    exit();
}

// Ambil username santri yang sedang login
$username = $_SESSION['santri'];

// Ambil user_id berdasarkan username
$query_santri = "SELECT id FROM users WHERE username='$username'";
$result_santri = mysqli_query($conn, $query_santri);
$santri = mysqli_fetch_assoc($result_santri);

if (!$santri) {
    die("Error: Data santri tidak ditemukan.");
}

$user_id = $santri['id']; // Ambil user_id yang sedang login

// Ambil ID berkas dari parameter URL
$id = $_GET['id'];

// Cek apakah berkas benar-benar milik user yang login
$query_berkas = "SELECT file_path FROM berkas WHERE id=$id AND user_id=$user_id";
$result_berkas = mysqli_query($conn, $query_berkas);
$row = mysqli_fetch_assoc($result_berkas);

if (!$row) {
    // Jika berkas bukan milik user atau tidak ditemukan, kembali ke index
    header("Location: index.php");
    exit();
}

// Hapus file dari folder uploads
$file_path = "uploads/" . $row['file_path'];
if (file_exists($file_path)) {
    unlink($file_path);
}

// Hapus data dari database
$conn->query("DELETE FROM berkas WHERE id=$id AND user_id=$user_id");

header("Location: index.php");
exit();
?>
