<?php
include 'config.php';

$id = $_POST['id'] ?? null;

if (!$id || !is_numeric($id)) {
    echo "<script>alert('ID tidak valid.'); window.location='arsip.php';</script>";
    exit;
}

try {
    $stmt = $conn->prepare("UPDATE buku SET status = 'aktif' WHERE id = ?");
    $stmt->execute([$id]);

    echo "<script>alert('Buku berhasil dipulihkan.'); window.location='arsip.php';</script>";
} catch (PDOException $e) {
    echo "<script>alert('Gagal memulihkan buku: " . $e->getMessage() . "'); window.location='arsip.php';</script>";
}
?>
