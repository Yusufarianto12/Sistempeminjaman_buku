<?php
include 'config.php';

$id = $_POST['id'] ?? $_GET['id'] ?? null;

if (!$id || !is_numeric($id) || intval($id) < 1) {
    echo "<script>alert('ID tidak valid.'); window.location='manage.php';</script>";
    exit;
}

$id = (int)$id;

try {
    // Cek keberadaan buku
    $stmt = $conn->prepare("SELECT * FROM buku WHERE id = ?");
    $stmt->execute([$id]);
    if ($stmt->rowCount() === 0) {
        echo "<script>alert('Buku tidak ditemukan.'); window.location='manage.php';</script>";
        exit;
    }

    // Ubah status menjadi nonaktif
    $stmt = $conn->prepare("UPDATE buku SET status = 'nonaktif' WHERE id = ?");
    $stmt->execute([$id]);

    echo "<script>alert('Buku berhasil diarsipkan.'); window.location='manage.php';</script>";
} catch (PDOException $e) {
    echo "<script>alert('Gagal mengarsipkan buku: " . $e->getMessage() . "'); window.location='manage.php';</script>";
}
