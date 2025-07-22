<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <h2>Dashboard Admin</h2>
    <a href="form_buku.php" class="btn btn-success mb-2">Tambah Buku</a>
    <a href="manage.php" class="btn btn-success mb-2">Kelola Koleksi buku</a>
    <a href="script2.php" class="btn btn-info mb-2">Lihat Daftar Buku</a>
    <a href="script.php" class="btn btn-warning mb-2">Lihat Riwayat Peminjaman Buku</a>
    <a href="logout.php" class="btn btn-danger mb-2">Logout</a>
</div>
</body>
</html>
