<?php
include '../config/conn.php'; // Memanggil koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $subjek = $_POST['subject'];
    $pesan = $_POST['message'];

    // Simpan ke database (Gunakan sintaks MySQLi yang benar)
    $stmt = $conn->prepare("INSERT INTO kontak (nama, email, subjek, pesan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $email, $subjek, $pesan);
    $stmt->execute();
    $stmt->close();

    echo "Pesan berhasil dikirim!";
} else {
    echo "Metode tidak diizinkan!";
}