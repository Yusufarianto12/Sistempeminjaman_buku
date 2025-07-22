<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Peminjaman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container mt-4">
    <a href="admin_dashboard.php" class="btn btn-success mb-2">Beranda</a>
    <a href="form_buku.php" class="btn btn-success mb-2">Tambah Buku</a>
    <a href="arsip.php" class="btn btn-success mb-2">Pulihkan Arsip Buku</a>
    <a href="manage.php" class="btn btn-success mb-2">Kelola Koleksi buku</a>
    <a href="script2.php" class="btn btn-info mb-2">Lihat Daftar Buku</a>
    <a href="logout.php" class="btn btn-danger mb-2">Logout</a>
    <h2>Riwayat Peminjaman Buku</h2>
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Judul Buku</th>
            <th>Aksi</th>
            <th>Tanggal</th>
        </tr>
        <?php
        $stmt = $conn->query("SELECT r.*, b.judul_buku FROM riwayat r JOIN buku b ON r.buku_id = b.id ORDER BY r.tanggal DESC");
        $no = 1;
        foreach ($stmt as $row):
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['judul_buku']) ?></td>
                <td><?= $row['aksi'] ?></td>
                <td><?= $row['tanggal'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
