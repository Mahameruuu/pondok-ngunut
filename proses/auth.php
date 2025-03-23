<?php
session_start();
include '../config/conn.php'; // Koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        // PROSES PENDAFTARAN
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Cek apakah email sudah ada
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "Email sudah digunakan!";
            exit();
        }

        $stmt->close();

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Simpan ke database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashedPassword);

        if ($stmt->execute()) {
            header("Location: ../login.php?success=1");
            exit();
        } else {
            echo "Pendaftaran gagal!";
        }

        $stmt->close();

    } elseif (isset($_POST['login'])) {
        // PROSES LOGIN
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $hashedPassword);
            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                header("Location: ../santri/pendaftaran.php");
                exit();
            } else {
                echo "Password salah!";
            }
        } else {
            echo "Email tidak ditemukan!";
        }

        $stmt->close();
    }
}

$conn->close();
?>
