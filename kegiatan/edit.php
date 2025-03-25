<?php
session_start();
include '../config/conn.php';

// Periksa apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Amankan username dari session
$username = mysqli_real_escape_string($conn, $_SESSION['admin']);

// Query untuk mengambil data admin
$query_admin = "SELECT username FROM admin WHERE username='$username'";
$result_admin = mysqli_query($conn, $query_admin);
$admin = mysqli_fetch_assoc($result_admin);

// Pastikan admin memiliki data
$admin_name = $admin ? $admin['username'] : "Unknown Admin";

// Ambil data kegiatan berdasarkan ID
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM kegiatan WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Kegiatan</title>
    <link href="../assets/vendor_admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">
        <?php include '../components/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include '../components/navbar.php'; ?>
                <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Tambah Kegiatan</h1>
                    <form action="proses.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Judul:</label>
                            <input type="text" name="judul" class="form-control" value="<?= $row['judul']; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Deskripsi:</label>
                            <textarea name="deskripsi" class="form-control" rows="3" required><?= $row['deskripsi']; ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Gambar:</label>
                            <input type="file" name="gambar" class="form-control">
                            <img src="uploads/<?= $row['gambar']; ?>" width="100" class="mt-2">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Tanggal:</label>
                            <input type="date" name="tanggal" class="form-control" value="<?= $row['tanggal']; ?>" required>
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
