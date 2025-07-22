<?php
$servername = "localhost";
$username = "root";
$password = "";

// Koneksi ke MySQL
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Buat database
$sql = "CREATE DATABASE IF NOT EXISTS perpustakaan";
if ($conn->query($sql)) {
    echo "Database 'perpustakaan' berhasil dibuat atau sudah ada.<br>";
} else {
    die("Gagal membuat database: " . $conn->error);
}

// Pilih database
$conn->select_db("perpustakaan");

// Buat tabel buku
$sql = "CREATE TABLE IF NOT EXISTS buku (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    judul_buku VARCHAR(100) NOT NULL,
    stok INT NOT NULL DEFAULT 0,
    stok_pinjam INT NOT NULL DEFAULT 0
)";
if ($conn->query($sql)) {
    echo "Tabel 'buku' berhasil dibuat atau sudah ada.<br>";
} else {
    die("Gagal membuat tabel buku: " . $conn->error);
}

// Buat tabel admin
$sql = "CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";
if ($conn->query($sql)) {
    echo "Tabel 'admin' berhasil dibuat atau sudah ada.<br>";
} else {
    die("Gagal membuat tabel admin: " . $conn->error);
}

// Insert admin default
$defaultAdminPassword = password_hash("admin123", PASSWORD_DEFAULT);
$conn->query("INSERT IGNORE INTO admin (id, username, password) VALUES (1, 'admin', '$defaultAdminPassword')");

// Buat tabel riwayat
$sql = "CREATE TABLE IF NOT EXISTS riwayat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    buku_id INT UNSIGNED NOT NULL,
    aksi ENUM('Pinjam','Kembali') NOT NULL,
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (buku_id) REFERENCES buku(id) ON DELETE CASCADE ON UPDATE CASCADE
)";
if ($conn->query($sql)) {
    echo "Tabel 'riwayat' berhasil dibuat atau sudah ada.<br>";
} else {
    die("Gagal membuat tabel riwayat: " . $conn->error);
}
// Tutup koneksi
$conn->close();
?>
