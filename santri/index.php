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

// Jika ada request untuk mengaktifkan akun
if (isset($_GET['activate_id'])) {
    $id = intval($_GET['activate_id']);
    $query_activate = "UPDATE santri SET status='active' WHERE id=$id";
    mysqli_query($conn, $query_activate);
    header("Location: ../santri/index.php");
    exit();
}

// Jika ada request untuk menonaktifkan akun
if (isset($_GET['deactivate_id'])) {
    $id = intval($_GET['deactivate_id']);
    $query_deactivate = "UPDATE santri SET status='rejected' WHERE id=$id";
    mysqli_query($conn, $query_deactivate);
    header("Location: ../santri/index.php");
    exit();
}

// Query untuk mengambil data santri dengan kolom yang diperlukan
$result = mysqli_query($conn, "SELECT * FROM santri");
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
        <?php include '../components/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?php include '../components/navbar.php'; ?>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Data Pendaftaran Santri</h1>
                    <a href="../santri/pendaftaran.php" class="btn btn-primary mb-3">Tambah Santri</a>
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Santri</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Kontak</th>
                                            <th>Program</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['tanggal_lahir']; ?></td>
                                                <td><?= $row['alamat']; ?></td>
                                                <td><?= $row['kontak']; ?></td>
                                                <td><?= $row['program']; ?></td>
                                                <td><?= $row['jenis_kelamin']; ?></td>
                                                <td>
                                                    <?php if ($row['status'] == 'active') { ?>
                                                        <a href="?deactivate_id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-times"></i> Nonaktifkan
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="?activate_id=<?= $row['id']; ?>" class="btn btn-success btn-sm">
                                                            <i class="fas fa-check"></i> Aktifkan
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
                    <a class="btn btn-primary" href="../admin/logout.php">Logout</a>
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
