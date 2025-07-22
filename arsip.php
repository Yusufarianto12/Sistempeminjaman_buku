<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Arsip Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container mt-4">
    <a href="admin_dashboard.php" class="btn btn-success mb-2">Beranda</a>
    <a href="form_buku.php" class="btn btn-success mb-2">Tambah Buku</a>
    <a href="manage.php" class="btn btn-success mb-2">Kelola Koleksi buku</a>
    <a href="script2.php" class="btn btn-info mb-2">Lihat Daftar Buku</a>
    <a href="script.php" class="btn btn-warning mb-2">Lihat Riwayat Peminjaman Buku</a>
    <a href="logout.php" class="btn btn-danger mb-2">Logout</a>
    <h2>Arsip Buku (Nonaktif)</h2>

    <!-- Form Pencarian -->
    <form method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari judul buku..." value="<?= $_GET['search'] ?? '' ?>">
    </form>

    <?php
    $search = $_GET['search'] ?? '';
    $stmt = $conn->prepare("SELECT * FROM buku WHERE status = 'nonaktif' AND judul_buku LIKE :search");
    $stmt->execute([':search' => "%$search%"]);
    $buku = $stmt->fetchAll();
    ?>

    <!-- Tabel Arsip Buku -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($buku) > 0): ?>
            <?php foreach ($buku as $index => $item): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($item['judul_buku']) ?></td>
                    <td><?= $item['stok'] ?></td>
                    <td>
                        <form method="POST" action="pulihkan.php" class="d-inline">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Pulihkan buku ini?')">Pulihkan</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4" class="text-center text-muted">Tidak ada buku yang diarsipkan.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
