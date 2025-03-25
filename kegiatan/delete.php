<?php
include '../config/conn.php';
$id = $_GET['id'];

$result = $conn->query("SELECT gambar FROM kegiatan WHERE id=$id");
$row = $result->fetch_assoc();
unlink("uploads/" . $row['gambar']);

$conn->query("DELETE FROM kegiatan WHERE id=$id");
header("Location: index.php");
?>
