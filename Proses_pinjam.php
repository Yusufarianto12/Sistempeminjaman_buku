<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    include 'config.php';
    $id = (int) $_POST['id'];

    try {
        $cek = $conn->prepare("SELECT stok FROM buku WHERE id = :id");
        $cek->bindValue(':id', $id, PDO::PARAM_INT);
        $cek->execute();
        $stok = $cek->fetchColumn();

        if ($stok === false) {
            echo "Buku tidak ditemukan.";
        } elseif ($stok > 0) {
            $update = $conn->prepare("UPDATE buku SET stok = stok - 1, stok_pinjam = stok_pinjam + 1 WHERE id = :id");
            $update->bindValue(':id', $id, PDO::PARAM_INT);
            $update->execute();

            if ($update->rowCount() > 0) {
                $log = $conn->prepare("INSERT INTO riwayat (buku_id, aksi, tanggal) VALUES (:id, 'Pinjam', NOW())");
                $log->bindValue(':id', $id, PDO::PARAM_INT);
                $log->execute();
                echo "Berhasil meminjam buku.";
            } else {
                echo "Gagal memperbarui stok.";
            }
        } else {
            echo "Stok tidak cukup.";
        }
    } catch (PDOException $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
}
?>
