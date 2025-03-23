<?php
session_start();
include '../config/conn.php';

if (isset($_SESSION['admin'])) {
    header("Location: admin/index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $query)) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Registrasi gagal. Silakan coba lagi.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register Admin</title>
    <link href="../assets/vendor_admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card o-hidden border-0 shadow-lg card-centered">
                <div class="card-body p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <?php if (isset($error)) { echo "<p style='color: red; text-align: center;'>$error</p>"; } ?>
                    <form class="user" method="POST">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-user" placeholder="Username" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" placeholder="Repeat Password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="login.php">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    <script src="../assets/vendor_admin/jquery/jquery.min.js"></script>
    <script src="../assets/vendor_admin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor_admin/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/js/sb-admin-2.min.js"></script>
</body>
</html>
