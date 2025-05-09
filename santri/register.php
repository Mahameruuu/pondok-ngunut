<?php
session_start();
include '../config/conn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $nama = htmlspecialchars(trim($_POST['nama']));
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = htmlspecialchars(trim($_POST['alamat']));
    $kontak = htmlspecialchars(trim($_POST['kontak']));
    $program = htmlspecialchars(trim($_POST['program']));
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Cek apakah email sudah terdaftar
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $error = "Email sudah digunakan!";
    } else {
        // Simpan ke database users
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        
        if ($stmt->execute()) {
            $user_id = $stmt->insert_id;
            
            // Simpan ke database santri dengan status pending
            $stmt = $conn->prepare("INSERT INTO santri (user_id, nama, tanggal_lahir, alamat, kontak, program, jenis_kelamin, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')");
            $stmt->bind_param("issssss", $user_id, $nama, $tanggal_lahir, $alamat, $kontak, $program, $jenis_kelamin);
            
            if ($stmt->execute()) {
                $_SESSION['santri_id'] = $stmt->insert_id;
                $_SESSION['username'] = $username;
                header("Location: login.php");
                exit();
            } else {
                $error = "Pendaftaran gagal! Silakan coba lagi.";
            }
        } else {
            $error = "Pendaftaran gagal! Silakan coba lagi.";
        }
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | Pondok Bahrul Ulum</title>
    <link href="assets/img/logo.jpg" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="text-center mb-3">Daftar</h3>
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger"> <?php echo $error; ?> </div>
                    <?php } ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kontak" class="form-label">Kontak</label>
                            <input type="text" id="kontak" name="kontak" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="program" class="form-label">Program</label>
                            <select id="program" name="program" class="form-control" required>
                                <option value="">Pilih Program</option>
                                <option value="Tahfidz">Tahfidz</option>
                                <option value="Kitab Kuning">Kitab Kuning</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </form>
                    <p class="text-center mt-3">
                        Sudah punya akun? <a href="login.php">Login di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>