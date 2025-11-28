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
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `tipe` varchar(7) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `gambar` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`, `tipe`, `deskripsi`, `gambar`) VALUES
(2, 'Nasi Telur', 9000, 'Makanan', 'Perpaduan telur goreng dan sayur ala masakan rumah', 'https://images.pexels.com/photos/19834047/pexels-photo-19834047/free-photo-of-chicken-thai-basil.jpeg?auto=compress&cs=tinysrgb&w=600'),
(3, 'Nasi Sayur', 6000, 'Makanan', 'Nasi, sayur, dan sambal ala masakan rumah ', 'https://makanmana.net/wp-content/uploads/2017/11/img_4201.jpg'),
(4, 'Lotek', 8000, 'Makanan', 'Terdiri dari ketupat dan sayuran rebus yang disiram bumbu kacang', 'https://www.masakapahariini.com/wp-content/uploads/2021/02/Lotek-Bandung-Sederhana.jpg'),
(5, 'Pecel', 8000, 'Makanan', 'Terdiri dari sayuran rebus yang disiram dengan sambal kacang', 'https://i.pinimg.com/originals/73/c0/9a/73c09ad3fef77d1bfa41cdf5219b72c0.png'),
(6, 'Soto', 7000, 'Makanan', 'Sup tradisional yang terbuat dari kaldu, daging, dan sayuran', 'https://i.pinimg.com/1200x/9b/e7/70/9be7701ba3a1729d1c3f3c44f96b3cfc.jpg'),
(7, 'Mie Ayam', 7000, 'Makanan', 'Terbuat dari mie kuning, daging ayam, sayuran, dan saus kecap', 'https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/01/10/1691000474.jpg'),
(8, 'Mie Ayam Bakso', 9000, 'Makanan', 'Mie ayam dengan tambahan bakso', 'https://down-id.img.susercontent.com/file/c413b0dc748f4573cb50cac4912ae54a'),
(9, 'Indomie', 5000, 'Makanan', 'Mie goreng instan dengan cita rasa khas', 'https://i.pinimg.com/736x/74/12/e5/7412e5232ae973ed192e86b8cab42ed0.jpg'),
(10, 'Indomie Telur', 7000, 'Makanan', 'Indomie dengan tambahan telur rebus', 'https://img.freepik.com/premium-photo/indomie-goreng-mie-goreng-indonesian-popular-instant-noodle_511235-9708.jpg'),
(11, 'Sambal Terong', 2000, 'Makanan', 'Terong goreng disiram dengan sambal cabai merah', 'https://cdn0-production-images-kly.akamaized.net/q9qNYSxvUpaTAsVK3vmiZH7cusU=/0x200:4608x2797/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4144583/original/008089000_1662107051-shutterstock_2189147689.jpg'),
(12, 'Gorengan', 1000, 'Makanan', 'Tempe mendoan, tahu isi, gembus, dan lainnya', 'https://cdn0-production-images-kly.akamaized.net/u5B4WzGlgXDauFGKRmii9tm0IIY=/1x61:1000x624/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4300389/original/060560700_1674522690-shutterstock_1893335917.jpg'),
(13, 'Teh', 3000, 'Minuman', 'Minuman teh asli dihidangkan hangat ataupun dingin', 'https://png.pngtree.com/png-vector/20240519/ourmid/pngtree-jumbo-cup-iced-tea-hd-png-image_12495355.png'),
(14, 'Jeruk', 3000, 'Minuman', 'Minuman jeruk asli dihidangkan hangat ataupun dingin', 'https://png.pngtree.com/png-clipart/20240408/original/pngtree-fresh-orange-ice-in-a-plastic-cup-png-image_14783410.png'),
(15, 'Kopi', 4000, 'Minuman', 'Minuman kopi asli dihidangkan hangat ataupun dingin', 'https://cdn.idntimes.com/content-images/community/2022/04/fromandroid-ed3fe0080fe038fe8bb66b5c8a7939e1.jpg'),
(16, 'Kopi Susu', 5000, 'Minuman', 'Minuman kopi + susu asli dihidangkan hangat ataupun dingin', 'https://media-cdn.tripadvisor.com/media/photo-s/12/98/3e/42/kopi-susu.jpg'),
(17, 'Good Day', 4000, 'Minuman', 'Minuman kopi instan dihidangkan hangat ataupun dingin', 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//95/MTA-43443085/good-day_kopi-good-day-all-varian-1-renteng_full01.jpg'),
(18, 'Es Kopyor', 4000, 'Minuman', 'Minuman kelapa asli yang disajikan bersama dengan susu ataupun sirup', 'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/94/2024/05/19/Pinterest-177060069.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
