<?php
include '../config/db.php'; // Koneksi ke database

$query = "SELECT COUNT(*) AS jumlah FROM santri WHERE status = 'aktif'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$jumlah_santri = $data['jumlah'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tambah Data Santri</h2>
    <form action="../proses/save_santri.php" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required>
        
        <label>Alamat:</label>
        <textarea name="alamat" required></textarea>
        
        <label>Kelas:</label>
        <input type="text" name="kelas" required>
        
        <label>Status:</label>
        <select name="status">
            <option value="aktif">Aktif</option>
            <option value="alumni">Alumni</option>
        </select>
        
        <label>Tanggal Masuk:</label>
        <input type="date" name="tanggal_masuk" required>
        
        <button type="submit">Simpan</button>
    </form>

    <h3>Total Santri Aktif: <?= $jumlah_santri ?></h3>
</body>
</html>
