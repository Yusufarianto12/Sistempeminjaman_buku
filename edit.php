<?php
include 'config.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID buku tidak ditemukan'); window.location='script2.php';</script>";
    exit;
}

$id = $_GET['id'];

// Ambil data buku berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM buku WHERE id = ?");
$stmt->execute([$id]);
$buku = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$buku) {
    echo "<script>alert('Data buku tidak ditemukan'); window.location='script2.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container mt-4">
    <h2>Edit Data Buku</h2>

    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?= $buku['id']; ?>">

        <div class="mb-3">
            <label for="judul_buku" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?= htmlspecialchars($buku['judul_buku']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Jumlah/Stok Buku</label>
            <input type="number" class="form-control" id="stok" name="stok" value="<?= $buku['stok']; ?>" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Update</button>
<button type="button" class="btn btn-secondary" onclick="window.location.href='manage.php'">Batal</button>
    </form>
</div>
</body>
</html>
