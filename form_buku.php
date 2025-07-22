<?php include 'config.php'; ?>

<h2>Tambah Buku</h2>
<form method="POST">
    <label>Judul Buku:</label>
    <input type="text" name="judul_buku" required><br>
    <label>Stok:</label>
    <input type="number" name="stok" required><br>
    <button type="submit">Tambah Buku</button>
<button type="button" class="btn btn-secondary" onclick="window.location.href='admin_dashboard.php'">Batal</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul_buku'];
    $stok = $_POST['stok'];

    $stmt = $conn->prepare("INSERT INTO buku (judul_buku, stok) VALUES (:judul, :stok)");
    $stmt->execute([':judul' => $judul, ':stok' => $stok]);

    echo "<p>Buku berhasil ditambahkan!</p>";
}
?>
