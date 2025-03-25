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

// Query untuk mengambil data santri
$query_santri = "SELECT username FROM users WHERE username='$username'";
$result_santri = mysqli_query($conn, $query_santri);
$santri = mysqli_fetch_assoc($result_santri);
$santri_name = $santri ? $santri['username'] : "Guest";

// Query untuk mengambil berkas milik santri
$query_berkas = "SELECT * FROM berkas WHERE user_id = (SELECT id FROM users WHERE username='$username')";
$result_berkas = mysqli_query($conn, $query_berkas);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SB Admin 2 - Dashboard</title>
    
    <!-- Custom fonts and styles -->
    <link href="../assets/vendor_admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include '../components/sidebar_santri.php'; ?>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?php include '../components/navbar_santri.php'; ?>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Daftar Berkas</h1>
                    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Berkas</a>
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Berkas</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>File</th>
                                        <th>Nama File</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result_berkas->fetch_assoc()): ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                // Cek apakah file adalah gambar
                                                $file_extension = pathinfo($row['file_path'], PATHINFO_EXTENSION);
                                                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

                                                if (in_array(strtolower($file_extension), $allowed_extensions)): ?>
                                                    <img src="<?= $row['file_path']; ?>" width="100">
                                                <?php else: ?>
                                                    <a href="<?= $row['file_path']; ?>" target="_blank">Lihat File</a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= htmlspecialchars($row['file_name']); ?></td>
                                            <td><?= $row['uploaded_at']; ?></td>
                                            <td>
                                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Pondok Ngunut 2025</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika Anda ingin mengakhiri sesi saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../assets/vendor_admin/jquery/jquery.min.js"></script>
    <script src="../assets/vendor_admin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor_admin/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/js/sb-admin-2.min.js"></script>
    <script src="../assets/vendor_admin/chart.js/Chart.min.js"></script>
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>
</body>
</html>
