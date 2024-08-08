-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2023 pada 03.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edu_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(10) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `nama_depan_booking` varchar(50) NOT NULL,
  `nama_belakang_booking` varchar(50) NOT NULL,
  `email_booking` varchar(100) NOT NULL,
  `tlp_booking` varchar(15) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `id_cabin` int(10) NOT NULL,
  `stat_booking` enum('0','1','2') NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `bayar` enum('0','1') NOT NULL,
  `orang_dewasa` int(10) NOT NULL,
  `anak_anak` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `check_in`, `check_out`, `nama_depan_booking`, `nama_belakang_booking`, `email_booking`, `tlp_booking`, `id_user`, `id_customer`, `id_cabin`, `stat_booking`, `total_harga`, `bayar`, `orang_dewasa`, `anak_anak`) VALUES
(363, '2023-11-20', '2023-11-24', 'Custom', 'Mers', 'customer@gmail.com', '0821114738264', 20, 14, 4, '2', '460000', '1', 2, 1),
(368, '2023-11-21', '2023-11-24', 'Budi', 'Suregar', 'budi@gmail.com', '0896774413222', 21, 15, 4, '2', '345000', '1', 2, 2),
(369, '2023-11-21', '2023-11-28', 'Custom', 'Mers', 'customer@gmail.com', '0821114738264', 20, 14, 2, '2', '805000', '1', 2, 1),
(371, '2023-11-28', '2023-11-30', 'Budi', 'Suregar', 'budi@gmail.com', '0896774413222', 21, 15, 5, '0', '230000', '1', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabin`
--

CREATE TABLE `cabin` (
  `id_cabin` int(10) NOT NULL,
  `no_cabin` varchar(10) NOT NULL,
  `booking` enum('0','1','2') NOT NULL,
  `harga_cabin` varchar(20) NOT NULL,
  `nama_customer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cabin`
--

INSERT INTO `cabin` (`id_cabin`, `no_cabin`, `booking`, `harga_cabin`, `nama_customer`) VALUES
(1, '0A1', '0', '135000', NULL),
(2, '0B1', '0', '115000', NULL),
(4, '0C3', '0', '115000', NULL),
(5, '0A2', '1', '115000', 'Budi'),
(6, '0B2', '0', '50000', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(10) NOT NULL,
  `nama_depan_customer` varchar(50) DEFAULT NULL,
  `nama_belakang_customer` varchar(50) DEFAULT NULL,
  `email_cus` varchar(100) NOT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `id_user` int(10) NOT NULL,
  `id_cabin` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_depan_customer`, `nama_belakang_customer`, `email_cus`, `jk`, `no_telp`, `id_user`, `id_cabin`) VALUES
(14, 'Custom', 'Mers', 'customer@gmail.com', 'L', '0821114738264', 20, NULL),
(15, 'Budi', 'Suregar', 'budi@gmail.com', 'L', '0896774413222', 21, 5),
(16, NULL, NULL, 'chand@gmail.com', NULL, NULL, 22, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` text NOT NULL,
  `stat_user` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `email`, `pass`, `stat_user`) VALUES
(5, 'Admin', 'admin@gmail.com', '$2y$10$N5uXnw855jVKQNATsgb/iuiVJxzg.frNahH6XUoKY/HP3Wh0mcaSy', '0'),
(6, 'Kasir', 'kasir@gmail.com', '$2y$10$GxECXVQ7lfBnmuE7jPM4YOXbw2RVQbdoM63vtxL9D7st9tThnkbpC', '1'),
(20, 'Customer', 'customer@gmail.com', '$2y$10$/BQB29tRt2QOJ7qPk8kIFuFx99Qze7WDS8BVe9w6XtjVRrlCsqSDq', '2'),
(21, 'Budizz', 'budi@gmail.com', '$2y$10$FXLbnCFmlNFg2LEYLBj8xenRQ1W0K1sn2Cn/4gTWU5ttfXxoEHEcC', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `cabin`
--
ALTER TABLE `cabin`
  ADD PRIMARY KEY (`id_cabin`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;

--
-- AUTO_INCREMENT untuk tabel `cabin`
--
ALTER TABLE `cabin`
  MODIFY `id_cabin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
