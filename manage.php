<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container mt-4">
    <a href="admin_dashboard.php" class="btn btn-success mb-2">Beranda</a>
    <a href="form_buku.php" class="btn btn-success mb-2">Tambah Buku</a>
    <a href="arsip.php" class="btn btn-success mb-2">Pulihkan Arsip Buku</a>
    <a href="script2.php" class="btn btn-info mb-2">Lihat Daftar Buku</a>
    <a href="script.php" class="btn btn-warning mb-2">Riwayat Peminjaman</a>
    <a href="arsip.php" class="btn btn-secondary mb-2">Lihat Arsip Buku</a>
    <a href="logout.php" class="btn btn-danger mb-2">Logout</a>

    <h2>Daftar Buku</h2>

    <form method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari judul buku..." value="<?= $_GET['search'] ?? '' ?>">
    </form>

    <?php
    $search = $_GET['search'] ?? '';
    $stmt = $conn->prepare("SELECT * FROM buku WHERE status = 'aktif' AND judul_buku LIKE :search");
    $stmt->execute([':search' => "%$search%"]);
    $buku = $stmt->fetchAll();
    ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buku as $index => $item): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($item['judul_buku']) ?></td>
                    <td>
                        <form method="GET" action="edit.php" class="d-inline">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>
                        <form method="POST" action="hapus.php" class="d-inline" onsubmit="return confirm('Yakin ingin mengarsipkan buku ini?')">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Arsipkan</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
