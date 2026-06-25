-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2026 at 04:23 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiket_bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int NOT NULL,
  `nama_bus` varchar(100) NOT NULL,
  `nomor_plat` varchar(20) NOT NULL,
  `kelas` enum('Executive','Ekonomi','Bisnis') NOT NULL DEFAULT 'Executive',
  `kapasitas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `nama_bus`, `nomor_plat`, `kelas`, `kapasitas`) VALUES
(2, 'SmartBus Bisnis ', 'DR 8888 BK', 'Bisnis', 38),
(3, 'Smartes ekonomi', 'TRX 888 AC', 'Ekonomi', 50);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int NOT NULL,
  `nama_bus` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `asal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tujuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jam_keberangkatan` time NOT NULL,
  `tanggal_keberangkatan` date DEFAULT NULL,
  `harga` int NOT NULL,
  `total_kursi` int NOT NULL,
  `id_bus` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama_bus`, `asal`, `tujuan`, `jam_keberangkatan`, `tanggal_keberangkatan`, `harga`, `total_kursi`, `id_bus`) VALUES
(1, 'Surya Kencana', 'Mataram', 'Sumbawa', '08:00:00', '2026-06-25', 150000, 12, 2),
(2, 'Titian Mas', 'Mataram', 'Bima', '15:30:00', '2026-06-25', 250000, 12, 3),
(3, 'surya', 'bima', 'mataram', '19:00:00', '2026-06-25', 300000, 0, 2),
(5, 'rinjani', 'sumbawa', 'mataram', '08:00:00', '2026-06-25', 200000, 0, 2),
(6, 'Gunung Harta', 'bumi', 'mars', '12:00:00', '2026-06-25', 1000000, 0, 3),
(7, 'merpati', 'sumbawa', 'mataram', '21:00:00', '2026-06-25', 150000, 0, 0),
(8, 'ngawi', 'nagwi', 'depok', '09:48:00', '2026-06-25', 100000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_jadwal` int NOT NULL,
  `nomor_kursi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_pembayaran` enum('Pending','Lunas','Dibatalkan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `tanggal_pesan` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_tiket`
--

CREATE TABLE `pemesanan_tiket` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_jadwal` int DEFAULT NULL,
  `nomor_kursi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_pembayaran` enum('Belum Bayar','Lunas') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Belum Bayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan_tiket`
--

INSERT INTO `pemesanan_tiket` (`id`, `id_user`, `id_jadwal`, `nomor_kursi`, `status_pembayaran`) VALUES
(1, 1, 1, 'A1', 'Lunas'),
(2, 2, 1, 'A2', 'Lunas'),
(3, 1, 2, 'B5', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `isi` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_general_ci DEFAULT 'aktif',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi`, `status`, `created_at`) VALUES
(2, 'mbg', 'Ya, program Makan Bergizi Gratis (MBG) masih berjalan, namun saat ini tengah dihentikan untuk sementara waktu khusus selama masa libur sekolah. ', 'nonaktif', '2026-06-22 05:55:07'),
(3, 'kopdes', 'Pemerintah menargetkan pembangunan 30.000 Koperasi Desa/Kelurahan Merah Putih (Kopdes) beroperasi penuh pada 16 Agustus 2026. ', 'nonaktif', '2026-06-22 08:13:28'),
(4, 'puja kerang ajaib', 'Siapa sih yang nggak kenal dengan serial kartun SpongeBob Squarepants? Ya, serial anak-anak ini sudah lama malang melintang di layar kaca. Kendati demikian, sampai saat ini, kartun yang satu ini masih eksis menghibur anak-anak Indonesia lho. Serial dengan karakter spons kuning yang tinggal di bawah laut ini memang memiliki banyak penggemar di Indonesia. Nggak cuma dari kalangan anak-anak, tetapi juga banyak orang dewasa yang tetap menyukai serial kartun yang satu ini.Kartun\r\n\r\nNah, kalau kamu adalah penggemar SpongeBob pasti udah nggak asing lagi dengan berbagai karakter yang sering muncul di episodenya. Misalnya saja Patrick si bintang laut, atau Squidward hingga Tuan Krabs. Nah, ketiganya ini memang menjadi karakter utama dalam serial kartun SpongeBob.', 'aktif', '2026-06-24 14:28:46'),
(5, 'pemerintahan', 'Pemerintah saat ini memfokuskan berbagai kebijakan pada ketahanan energi, ekonomi, dan pendidikan. Fokus utamanya mencakup stabilisasi harga BBM dan LPG, percepatan pembangunan sekolah, serta peningkatan kesejahteraan guru. Di tengah dinamika tersebut, berbagai elemen masyarakat juga terus mengawal program-program strategis seperti Makan Bergizi Gratis (MBG).', 'aktif', '2026-06-24 14:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_jadwal` int NOT NULL,
  `nomor_kursi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_pembayaran` enum('Pending','Lunas','Dibatalkan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `kode_tiket` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_jadwal`, `nomor_kursi`, `status_pembayaran`, `kode_tiket`, `bukti_bayar`, `total_harga`, `created_at`) VALUES
(1, 7, 1, 'B4', 'Lunas', 'SB-LEGACY1', NULL, 150000, '2026-06-23 02:51:03'),
(2, 7, 1, 'B4', 'Lunas', 'SB-LEGACY2', NULL, 150000, '2026-06-23 02:51:09'),
(3, 7, 1, 'A4', 'Lunas', 'SB-LEGACY3', NULL, 150000, '2026-06-23 03:18:02'),
(4, 7, 1, 'A4', 'Lunas', 'SB-LEGACY4', NULL, 150000, '2026-06-23 03:25:12'),
(5, 7, 1, 'A8', 'Lunas', 'SB-LEGACY5', NULL, 150000, '2026-06-23 03:25:31'),
(6, 7, 1, 'B8', 'Lunas', 'SB-LEGACY6', NULL, 150000, '2026-06-23 13:21:31'),
(7, 7, 1, 'A14', 'Lunas', 'SB-LEGACY7', NULL, 150000, '2026-06-23 13:26:47'),
(8, 7, 1, 'B12', 'Lunas', 'SB-LEGACY8', NULL, 150000, '2026-06-23 22:49:58'),
(9, 7, 1, 'A13', 'Lunas', 'SB-LEGACY9', NULL, 150000, '2026-06-23 15:31:32'),
(10, 7, 1, 'A17', 'Pending', 'SB-LEGACY10', NULL, 150000, '2026-06-23 15:31:32'),
(11, 7, 1, 'A13', 'Pending', 'SB-LEGACY11', NULL, 150000, '2026-06-23 15:33:47'),
(12, 7, 1, 'A17', 'Pending', 'SB-LEGACY12', NULL, 150000, '2026-06-23 15:33:47'),
(13, 7, 1, 'B18', 'Pending', 'SB-LEGACY13', NULL, 150000, '2026-06-23 15:52:32'),
(14, 7, 1, 'A18', 'Pending', 'SB-LEGACY14', NULL, 150000, '2026-06-23 15:52:51'),
(15, 7, 1, 'A18', 'Pending', 'SB-LEGACY15', NULL, 150000, '2026-06-23 15:56:54'),
(16, 7, 1, 'B17', 'Pending', 'SB-17563483', NULL, 150000, '2026-06-23 17:49:24'),
(17, 7, 1, 'B19', 'Pending', 'SB-6970C330', NULL, 150000, '2026-06-23 20:45:43'),
(18, 7, 2, 'A18', 'Lunas', 'SB-CD052DCC', NULL, 250000, '2026-06-23 20:50:43'),
(19, 16, 3, 'B18', 'Lunas', 'SB-E676AD0F', NULL, 300000, '2026-06-23 21:22:31'),
(20, 16, 6, 'A5', 'Lunas', 'SB-971853ED', NULL, 1000000, '2026-06-23 21:55:09'),
(21, 16, 6, 'B7', 'Lunas', 'SB-971853ED', NULL, 1000000, '2026-06-23 21:55:09'),
(22, 16, 6, 'A14', 'Lunas', 'SB-971853ED', NULL, 1000000, '2026-06-23 21:55:09'),
(23, 16, 6, 'B17', 'Lunas', 'SB-971853ED', NULL, 1000000, '2026-06-23 21:55:09'),
(24, 16, 6, 'B18', 'Lunas', 'SB-971853ED', NULL, 1000000, '2026-06-23 21:55:09'),
(25, 16, 6, 'A23', 'Lunas', 'SB-971853ED', NULL, 1000000, '2026-06-23 21:55:09'),
(26, 17, 3, 'B12', 'Pending', 'SB-1ACA0994', NULL, 300000, '2026-06-23 22:45:28'),
(27, 7, 6, 'B11', 'Lunas', 'SB-41DE8B9F', NULL, 1000000, '2026-06-24 05:52:20'),
(28, 7, 1, 'A12', 'Lunas', 'SB-4162BD0D', NULL, 150000, '2026-06-24 20:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `bintang` int NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `username`, `bintang`, `komentar`, `tanggal`) VALUES
(1, 'mail', 5, 'soalnya ayamnya keras', '2026-06-22 19:15:02'),
(2, 'mail', 2, 'ayamnya keras', '2026-06-22 19:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','petugas','penumpang') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'penumpang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'Yadan', '123', 'petugas'),
(2, 'admin1', 'admin123', 'admin'),
(3, 'mail admin', 'mail12345', 'admin'),
(7, 'mail', '123', 'penumpang'),
(9, 'petugas1', 'petugas123', 'petugas'),
(10, 'ismail', '123', 'penumpang'),
(11, '777', 'dor123', 'petugas'),
(12, 'mail', '123', 'penumpang'),
(13, 'mail', '123', 'penumpang'),
(14, 'inaz', '777', 'penumpang'),
(15, 'dani', '888', 'penumpang'),
(16, 'rafi', '222', 'penumpang'),
(17, 'karmila', '777', 'penumpang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`);

--
-- Constraints for table `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  ADD CONSTRAINT `pemesanan_tiket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_tiket_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
