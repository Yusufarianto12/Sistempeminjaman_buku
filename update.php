<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $judul_buku = $_POST['judul_buku'];
    $stok = $_POST['stok'];

    try {
        $stmt = $conn->prepare("UPDATE buku SET judul_buku = ?, stok = ? WHERE id = ?");
        $stmt->execute([$judul_buku, $stok, $id]);

        echo "<script>alert('Data buku berhasil diperbarui'); window.location='script2.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Gagal memperbarui data: " . $e->getMessage() . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Permintaan tidak valid'); window.location='script2.php';</script>";
}
?>
