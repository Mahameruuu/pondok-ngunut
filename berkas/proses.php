<?php
include '../config/conn.php';
session_start(); // Tambahkan session_start()

if (isset($_POST['tambah'])) {
    $user_id = $_SESSION['user_id']; 
    $file_name = $_POST['file_name'];
    $file_path = $_FILES['file_path']['name'];
    $target = "uploads/" . basename($file_path);
    
    if (move_uploaded_file($_FILES['file_path']['tmp_name'], $target)) {
        $conn->query("INSERT INTO berkas (user_id, file_name, file_path) VALUES ('$user_id', '$file_name', '$target')");
    }
    header("Location: index.php");
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $file_name = $_POST['file_name'];
    
    if ($_FILES['file_path']['name']) {
        $file_path = $_FILES['file_path']['name'];
        $target = "uploads/" . basename($file_path);
        move_uploaded_file($_FILES['file_path']['tmp_name'], $target);
        $conn->query("UPDATE berkas SET file_name='$file_name', file_path='$target' WHERE id=$id");
    } else {
        $conn->query("UPDATE berkas SET file_name='$file_name' WHERE id=$id");
    }
    header("Location: index.php");
}
?>
