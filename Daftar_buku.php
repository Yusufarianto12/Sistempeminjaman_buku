<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container mt-4">
    <a href="index.php" class="btn btn-success mb-2">Beranda</a>
    <a href="daftar_buku.php" class="btn btn-info mb-2">Daftar Buku</a>
    <a href="riwayat.php" class="btn btn-warning mb-2">Riwayat Peminjaman</a>

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
                <th>Stok Tersedia</th>
                <th>Stok Pinjam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buku as $index => $item): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($item['judul_buku']) ?></td>
                    <td><?= $item['stok'] ?></td>
                    <td><?= $item['stok_pinjam'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-sm pinjam" data-id="<?= $item['id'] ?>">Pinjam</button>
                        <button class="btn btn-success btn-sm kembalikan" data-id="<?= $item['id'] ?>">Kembalikan</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('.pinjam').click(function() {
    var id = $(this).data('id');
    $.post('proses_pinjam.php', { id: id }, function(response) {
        alert(response);
        location.reload();
    });
});
$('.kembalikan').click(function() {
    var id = $(this).data('id');
    $.post('proses_kembalikan.php', { id: id }, function(response) {
        alert(response);
        location.reload();
    });
});
</script>
</body>
</html>
