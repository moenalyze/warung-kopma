-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2024 pada 20.23
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pesanan`
--

CREATE TABLE `riwayat_pesanan` (
  `id_riwayat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `notes` int(11) NOT NULL,
  `subtotal` varchar(100) CHARACTER SET tis620 COLLATE tis620_bin NOT NULL,
  `tanggal_dibayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_pesanan`
--

INSERT INTO `riwayat_pesanan` (`id_riwayat`, `id_user`, `id_menu`, `kuantitas`, `notes`, `subtotal`, `tanggal_dibayar`) VALUES
(22, 1, 4, 8, 0, '64000', '2024-11-19 21:08:27'),
(23, 1, 17, 1, 0, '4000', '2024-11-19 21:08:27'),
(24, 1, 8, 1, 0, '9000', '2024-11-19 21:08:27'),
(25, 1, 4, 8, 0, '64000', '2024-11-19 21:11:00'),
(26, 1, 17, 1, 0, '4000', '2024-11-19 21:11:00'),
(27, 1, 8, 1, 0, '9000', '2024-11-19 21:11:00'),
(28, 1, 4, 8, 0, '64000', '2024-11-19 21:11:54'),
(29, 1, 17, 1, 0, '4000', '2024-11-19 21:11:54'),
(30, 1, 8, 1, 0, '9000', '2024-11-19 21:11:54'),
(31, 1, 4, 1, 0, '8000', '2024-11-19 21:21:15'),
(32, 1, 3, 2, 0, '12000', '2024-11-19 22:10:30'),
(33, 1, 3, 1, 0, '6000', '2024-11-19 22:16:41'),
(34, 1, 5, 1, 0, '8000', '2024-11-19 22:17:14'),
(35, 1, 5, 1, 0, '8000', '2024-11-20 01:29:05'),
(36, 1, 13, 1, 0, '3000', '2024-11-20 01:29:05'),
(37, 1, 15, 1, 0, '4000', '2024-11-20 01:29:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `riwayat_pesanan`
--
ALTER TABLE `riwayat_pesanan`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `riwayat_pesanan`
--
ALTER TABLE `riwayat_pesanan`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `riwayat_pesanan`
--
ALTER TABLE `riwayat_pesanan`
  ADD CONSTRAINT `id_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
