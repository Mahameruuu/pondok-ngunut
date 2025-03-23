<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Santri | Pondok Bahrul Ulum</title>
    <link href="assets/img/logo.jpg" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="text-center mb-4">Form Pendaftaran Santri</h2>
                    <form action="../proses/proses_pendaftaran.php" method="post" enctype="multipart/form-data">
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
                            <input type="text" id="alamat" name="alamat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="kontak" class="form-label">Kontak Orang Tua</label>
                            <input type="tel" id="kontak" name="kontak" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="program" class="form-label">Pilihan Program</label>
                            <select id="program" name="program" class="form-select" required>
                                <option value="">Pilih Program</option>
                                <option value="tahfidz">Tahfidz</option>
                                <option value="kitab_kuning">Kitab Kuning</option>
                                <option value="diniyah">Diniyah</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="berkas" class="form-label">Unggah Kartu Keluarga</label>
                            <input type="file" id="berkas" name="berkas" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
                        </div>
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
