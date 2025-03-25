<?php
session_start();
include '../config/conn.php';

// Periksa apakah pengguna sudah login (santri)
if (!isset($_SESSION['santri'])) {
    header("Location: login.php");
    exit();
}

// Ambil username santri yang sedang login
$username = $_SESSION['santri'];

// Query untuk mengambil ID dan username santri
$query_santri = "SELECT id, username FROM users WHERE username='$username'";
$result_santri = mysqli_query($conn, $query_santri);
$santri = mysqli_fetch_assoc($result_santri);

// Pastikan data santri ditemukan
if (!$santri) {
    die("Error: Data pengguna tidak ditemukan.");
}

// Simpan ID dan username santri
$user_id = $santri['id'];
$santri_name = $santri['username'];

// Query untuk mengambil berkas milik santri berdasarkan user_id
$query_berkas = "SELECT * FROM berkas WHERE user_id = '$user_id' ORDER BY uploaded_at DESC";
$result_berkas = mysqli_query($conn, $query_berkas);
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Berkas</title>
    <link href="../assets/vendor_admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include '../components/sidebar_santri.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include '../components/navbar_santri.php'; ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Tambah Berkas</h1>
                    <p>Selamat datang, <b><?= htmlspecialchars($username); ?></b></p>
                    <form action="proses.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Nama File:</label>
                            <input type="text" name="file_name" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Unggah File:</label>
                            <input type="file" name="file_path" class="form-control" required>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/vendor_admin/jquery/jquery.min.js"></script>
    <script src="../assets/vendor_admin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sb-admin-2.min.js"></script>
</body>
</html>
