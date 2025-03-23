<?php
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $status = $_POST['status'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $query = "INSERT INTO santri (nama, alamat, kelas, status, tanggal_masuk) 
              VALUES ('$nama', '$alamat', '$kelas', '$status', '$tanggal_masuk')";
    
    if (mysqli_query($conn, $query)) {
        echo "Santri berhasil ditambahkan.";
        header("Location: ../admin/santri.php"); // Redirect kembali ke halaman admin
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>
