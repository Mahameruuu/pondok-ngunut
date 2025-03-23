<?php
include '../config/db.php';

$query = "SELECT * FROM santri";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Santri</title>
</head>
<body>
    <h2>Daftar Santri</h2>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kelas</th>
            <th>Status</th>
            <th>Tanggal Masuk</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['kelas'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['tanggal_masuk'] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
