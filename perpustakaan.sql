-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 05:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$YknfvI3fE/FfzPSF2fuV4.FWwzJkWdEVbkf2RTD2ceSftSnVZaXoe');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `stok_pinjam` int(11) NOT NULL DEFAULT 0,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul_buku`, `stok`, `stok_pinjam`, `status`) VALUES
(1, 'pengembangan AI dengan dib learning', 15, 0, 'aktif'),
(2, 'dasar-dasar pemograman', 33, 5, 'aktif'),
(3, 'jafascript tingkat lanjut', 5, 0, 'aktif'),
(4, 'algoritma pemograman', 14, 1, 'aktif'),
(6, 'C++ untuk pemula', 50, 5, 'aktif'),
(7, 'pengembangan AI dengan python', 5, 5, 'aktif'),
(8, 'rekayasa perangkat lunak', 3, 3, 'aktif'),
(9, 'pengenalan laravel', 30, 3, 'nonaktif'),
(10, 'pengenalan python', 4, 3, 'aktif'),
(11, 'gerbang logika', 5, 2, 'aktif'),
(14, 'statistik', 15, 0, 'nonaktif'),
(15, 'pengenalan mesin learning', 3, 2, 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(10) UNSIGNED NOT NULL,
  `buku_id` int(10) UNSIGNED NOT NULL,
  `aksi` enum('Pinjam','Kembali') NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `buku_id`, `aksi`, `jumlah`, `tanggal`) VALUES
(1, 2, 'Pinjam', 0, '2025-06-08 20:15:48'),
(2, 3, 'Pinjam', 0, '2025-06-08 20:16:14'),
(3, 3, 'Pinjam', 0, '2025-06-08 20:16:33'),
(4, 2, 'Pinjam', 0, '2025-06-08 20:16:58'),
(5, 2, 'Pinjam', 0, '2025-06-08 20:17:12'),
(6, 2, 'Kembali', 0, '2025-06-08 20:17:30'),
(7, 2, 'Kembali', 0, '2025-06-08 20:17:44'),
(8, 1, 'Pinjam', 0, '2025-06-08 20:18:15'),
(9, 1, 'Pinjam', 0, '2025-06-08 20:18:25'),
(10, 1, 'Pinjam', 0, '2025-06-08 20:18:34'),
(11, 1, 'Pinjam', 0, '2025-06-08 20:18:42'),
(12, 1, 'Pinjam', 0, '2025-06-08 20:18:51'),
(13, 2, 'Pinjam', 0, '2025-06-08 20:19:14'),
(14, 2, 'Pinjam', 0, '2025-06-08 20:19:20'),
(15, 4, 'Pinjam', 0, '2025-06-08 20:19:41'),
(16, 4, 'Pinjam', 0, '2025-06-08 20:19:49'),
(17, 4, 'Pinjam', 0, '2025-06-08 20:19:56'),
(18, 1, 'Pinjam', 0, '2025-06-09 20:51:59'),
(19, 1, 'Pinjam', 0, '2025-06-09 20:52:07'),
(20, 1, 'Pinjam', 0, '2025-06-09 20:52:25'),
(21, 1, 'Pinjam', 0, '2025-06-09 20:52:43'),
(22, 1, 'Pinjam', 0, '2025-06-09 20:52:51'),
(23, 1, 'Pinjam', 0, '2025-06-09 20:52:57'),
(24, 1, 'Pinjam', 0, '2025-06-09 20:53:02'),
(25, 2, 'Pinjam', 0, '2025-06-09 20:53:33'),
(26, 2, 'Pinjam', 0, '2025-06-09 20:53:39'),
(27, 3, 'Pinjam', 0, '2025-06-09 20:54:18'),
(28, 3, 'Pinjam', 0, '2025-06-09 20:54:23'),
(29, 3, 'Pinjam', 0, '2025-06-09 20:54:30'),
(30, 4, 'Kembali', 0, '2025-06-09 20:58:54'),
(31, 4, 'Kembali', 0, '2025-06-09 20:58:58'),
(32, 4, 'Kembali', 0, '2025-06-09 20:59:01'),
(33, 3, 'Kembali', 0, '2025-06-09 20:59:15'),
(34, 3, 'Kembali', 0, '2025-06-09 20:59:18'),
(35, 3, 'Kembali', 0, '2025-06-09 20:59:21'),
(36, 3, 'Kembali', 0, '2025-06-09 20:59:23'),
(37, 3, 'Kembali', 0, '2025-06-09 20:59:26'),
(38, 2, 'Kembali', 0, '2025-06-09 20:59:39'),
(39, 2, 'Kembali', 0, '2025-06-09 20:59:42'),
(40, 2, 'Kembali', 0, '2025-06-09 20:59:46'),
(41, 2, 'Kembali', 0, '2025-06-09 20:59:49'),
(42, 2, 'Kembali', 0, '2025-06-09 20:59:52'),
(43, 1, 'Kembali', 0, '2025-06-09 21:00:03'),
(44, 1, 'Kembali', 0, '2025-06-09 21:00:10'),
(45, 1, 'Kembali', 0, '2025-06-09 21:00:14'),
(46, 1, 'Kembali', 0, '2025-06-09 21:00:18'),
(47, 1, 'Kembali', 0, '2025-06-09 21:00:21'),
(48, 1, 'Kembali', 0, '2025-06-09 21:00:22'),
(49, 1, 'Kembali', 0, '2025-06-09 21:00:26'),
(50, 1, 'Kembali', 0, '2025-06-09 21:00:30'),
(51, 1, 'Kembali', 0, '2025-06-09 21:00:33'),
(52, 1, 'Kembali', 0, '2025-06-09 21:00:39'),
(53, 1, 'Pinjam', 0, '2025-06-09 21:00:44'),
(54, 1, 'Kembali', 0, '2025-06-09 21:00:51'),
(55, 1, 'Pinjam', 0, '2025-06-09 21:00:56'),
(56, 1, 'Kembali', 0, '2025-06-09 21:01:09'),
(57, 1, 'Kembali', 0, '2025-06-09 21:01:15'),
(58, 1, 'Kembali', 0, '2025-06-09 21:01:21'),
(59, 1, 'Pinjam', 0, '2025-06-09 21:03:45'),
(60, 2, 'Pinjam', 0, '2025-06-09 21:04:01'),
(61, 2, 'Kembali', 0, '2025-06-09 21:04:11'),
(62, 1, 'Kembali', 0, '2025-06-09 21:04:22'),
(63, 1, 'Pinjam', 0, '2025-06-11 13:05:03'),
(64, 1, 'Pinjam', 0, '2025-06-11 13:05:07'),
(65, 2, 'Pinjam', 0, '2025-06-11 13:05:20'),
(66, 2, 'Pinjam', 0, '2025-06-11 13:05:24'),
(67, 3, 'Pinjam', 0, '2025-06-11 13:05:35'),
(68, 3, 'Pinjam', 0, '2025-06-11 13:05:39'),
(69, 2, 'Kembali', 0, '2025-06-11 13:07:13'),
(70, 2, 'Kembali', 0, '2025-06-11 13:07:27'),
(71, 3, 'Kembali', 0, '2025-06-11 13:07:38'),
(72, 3, 'Kembali', 0, '2025-06-11 13:07:47'),
(73, 1, 'Kembali', 0, '2025-06-11 13:19:46'),
(74, 4, 'Pinjam', 0, '2025-06-11 13:20:10'),
(75, 4, 'Pinjam', 0, '2025-06-11 13:20:17'),
(76, 1, 'Kembali', 0, '2025-06-11 13:21:44'),
(77, 4, 'Kembali', 0, '2025-06-11 13:21:57'),
(78, 4, 'Kembali', 0, '2025-06-11 13:22:02'),
(79, 6, 'Pinjam', 0, '2025-06-18 20:59:20'),
(80, 4, 'Pinjam', 0, '2025-06-18 20:59:35'),
(81, 2, 'Pinjam', 0, '2025-06-18 20:59:51'),
(82, 2, 'Pinjam', 0, '2025-06-18 20:59:58'),
(83, 2, 'Pinjam', 0, '2025-06-18 21:00:06'),
(84, 11, 'Pinjam', 0, '2025-06-18 21:06:53'),
(85, 11, 'Pinjam', 0, '2025-06-18 21:07:07'),
(86, 10, 'Pinjam', 0, '2025-06-18 21:07:20'),
(87, 10, 'Pinjam', 0, '2025-06-18 21:07:24'),
(88, 10, 'Pinjam', 0, '2025-06-18 21:07:29'),
(89, 8, 'Pinjam', 0, '2025-06-18 21:07:50'),
(90, 8, 'Pinjam', 0, '2025-06-18 21:07:59'),
(91, 8, 'Pinjam', 0, '2025-06-18 21:08:03'),
(92, 2, 'Kembali', 0, '2025-06-28 09:37:23'),
(93, 2, 'Kembali', 0, '2025-06-28 09:37:40'),
(94, 2, 'Kembali', 0, '2025-06-28 09:37:45'),
(95, 2, 'Pinjam', 0, '2025-06-28 09:38:14'),
(96, 2, 'Pinjam', 0, '2025-06-28 09:38:24'),
(97, 2, 'Pinjam', 0, '2025-06-28 09:38:28'),
(98, 2, 'Pinjam', 0, '2025-06-28 09:38:31'),
(99, 2, 'Pinjam', 0, '2025-06-28 09:38:35'),
(100, 6, 'Kembali', 0, '2025-06-28 11:12:18'),
(101, 6, 'Pinjam', 0, '2025-06-29 14:14:03'),
(102, 6, 'Pinjam', 0, '2025-06-29 14:14:08'),
(103, 6, 'Pinjam', 0, '2025-06-29 14:14:11'),
(104, 6, 'Pinjam', 0, '2025-06-29 14:14:14'),
(105, 6, 'Pinjam', 0, '2025-06-29 14:14:18'),
(106, 7, 'Pinjam', 0, '2025-06-29 14:14:29'),
(107, 7, 'Pinjam', 0, '2025-06-29 14:14:33'),
(108, 7, 'Pinjam', 0, '2025-06-29 14:14:38'),
(109, 7, 'Pinjam', 0, '2025-06-29 14:14:41'),
(110, 7, 'Pinjam', 0, '2025-06-29 14:14:45'),
(111, 9, 'Pinjam', 0, '2025-06-29 14:16:50'),
(112, 9, 'Pinjam', 0, '2025-06-29 14:16:54'),
(113, 9, 'Pinjam', 0, '2025-06-29 14:16:58'),
(114, 11, 'Kembali', 0, '2025-06-29 14:19:13'),
(115, 11, 'Kembali', 0, '2025-06-29 14:19:22'),
(116, 11, 'Pinjam', 0, '2025-06-29 14:21:05'),
(117, 11, 'Pinjam', 0, '2025-06-29 14:21:09'),
(118, 14, 'Pinjam', 0, '2025-06-29 22:11:12'),
(119, 14, 'Pinjam', 0, '2025-06-29 22:11:22'),
(120, 14, 'Kembali', 0, '2025-06-29 22:11:34'),
(121, 14, 'Kembali', 0, '2025-06-29 22:11:45'),
(122, 11, 'Pinjam', 0, '2025-06-30 22:01:44'),
(123, 11, 'Pinjam', 0, '2025-06-30 22:01:59'),
(124, 11, 'Kembali', 0, '2025-06-30 22:02:06'),
(125, 11, 'Kembali', 0, '2025-06-30 22:02:10'),
(126, 15, 'Pinjam', 0, '2025-06-30 22:04:30'),
(127, 15, 'Pinjam', 0, '2025-06-30 22:04:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
