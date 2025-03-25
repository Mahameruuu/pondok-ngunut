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
$query_santri = "SELECT id, username FROM users WHERE username='$username'";
$result_santri = mysqli_query($conn, $query_santri);
$santri = mysqli_fetch_assoc($result_santri);

if (!$santri) {
    die("Error: Data santri tidak ditemukan.");
}

$user_id = $santri['id']; 
$santri_name = $santri['username'];

// Query untuk mengambil data berkas berdasarkan ID dan user_id (agar hanya pemilik yang bisa akses)
$query = "SELECT * FROM berkas WHERE user_id=$user_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan atau bukan milik user yang login, kembali ke halaman daftar berkas
if (!$row) {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Berkas</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Edit Berkas</h1>
                    <form action="proses.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Nama Berkas:</label>
                            <input type="text" name="file_name" class="form-control" value="<?= htmlspecialchars($row['file_name']); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">File Saat Ini:</label><br>
                            <?php
                            $file_extension = pathinfo($row['file_path'], PATHINFO_EXTENSION);
                            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

                            if (in_array(strtolower($file_extension), $allowed_extensions)): ?>
                                <img src="<?= $row['file_path']; ?>" width="100" class="mt-2">
                            <?php else: ?>
                                <a href="<?= $row['file_path']; ?>" target="_blank">Lihat File</a>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Unggah File Baru (Opsional):</label>
                            <input type="file" name="file_path" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Upload:</label>
                            <input type="text" class="form-control" value="<?= $row['uploaded_at']; ?>" readonly>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
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
