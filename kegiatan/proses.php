<?php
include '../config/conn.php';

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];

    $gambar = $_FILES['gambar']['name'];
    $target = "uploads/" . basename($gambar);
    
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $conn->query("INSERT INTO kegiatan (judul, deskripsi, gambar, tanggal) 
                      VALUES ('$judul', '$deskripsi', '$gambar', '$tanggal')");
    }
    header("Location: index.php");
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];

    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $target = "uploads/" . basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
        $conn->query("UPDATE kegiatan SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar', tanggal='$tanggal' WHERE id=$id");
    } else {
        $conn->query("UPDATE kegiatan SET judul='$judul', deskripsi='$deskripsi', tanggal='$tanggal' WHERE id=$id");
    }
    header("Location: index.php");
}
?>
