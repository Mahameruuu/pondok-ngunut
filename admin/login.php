<?php
session_start();
include '../config/conn.php';

if (isset($_SESSION['admin'])) {
    header("Location: ../admin/index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); 

    $query = "SELECT * FROM admin WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($_POST['password'], $row['password'])) {
        $_SESSION['admin'] = $username;
        header("Location: ../admin/index.php");
        exit();
    } else {
        $error = "Username atau Password salah!";
    }

}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Admin</title>
    <link href="../assets/vendor_admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                    </div>
                    <?php if (isset($error)) { echo "<p style='color: red; text-align: center;'>$error</p>"; } ?>
                    <form class="user" method="POST">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-user" placeholder="Enter Username..." required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="register.php">Create an Account!</a>
                    </div>
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
