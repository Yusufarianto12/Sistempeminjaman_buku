<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    include 'config.php';
    $id = (int) $_POST['id'];

    try {
        $cek = $conn->prepare("SELECT stok_pinjam FROM buku WHERE id = :id");
        $cek->bindValue(':id', $id, PDO::PARAM_INT);
        $cek->execute();
        $pinjam = $cek->fetchColumn();

        if ($pinjam === false) {
            echo "Buku tidak ditemukan.";
        } elseif ($pinjam > 0) {
            $update = $conn->prepare("UPDATE buku SET stok = stok + 1, stok_pinjam = stok_pinjam - 1 WHERE id = :id");
            $update->bindValue(':id', $id, PDO::PARAM_INT);
            $update->execute();

            if ($update->rowCount() > 0) {
                $log = $conn->prepare("INSERT INTO riwayat (buku_id, aksi, tanggal) VALUES (:id, 'Kembali', NOW())");
                $log->bindValue(':id', $id, PDO::PARAM_INT);
                $log->execute();
                echo "Buku berhasil dikembalikan.";
            } else {
                echo "Gagal memperbarui stok.";
            }
        } else {
            echo "Tidak ada buku yang sedang dipinjam.";
        }
    } catch (PDOException $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
}
?>
