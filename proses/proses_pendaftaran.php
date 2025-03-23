<?php
session_start();
include '../config/conn.php';

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    die("Akses ditolak. Harap login terlebih dahulu.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $nama = htmlspecialchars($_POST['nama']);
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = htmlspecialchars($_POST['alamat']);
    $kontak = htmlspecialchars($_POST['kontak']);
    $program = htmlspecialchars($_POST['program']);

    // Proses Upload File
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = basename($_FILES["berkas"]["name"]);
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = time() . "_" . uniqid() . "." . $file_extension;
    $target_file = $target_dir . $new_file_name;

    if (move_uploaded_file($_FILES["berkas"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO pendaftaran_santri (user_id, nama, tanggal_lahir, alamat, kontak, program, berkas) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssss", $user_id, $nama, $tanggal_lahir, $alamat, $kontak, $program, $target_file);
        
        if ($stmt->execute()) {
            header("Location: sukses.php"); 
            exit();
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Gagal mengunggah file.";
    }
}

$conn->close();
?>
