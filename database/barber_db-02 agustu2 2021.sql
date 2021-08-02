-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Agu 2021 pada 09.19
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barber_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagi_hasil`
--

CREATE TABLE `bagi_hasil` (
  `id_bagi` int(3) NOT NULL,
  `pihak_1` int(10) NOT NULL,
  `pihak_2` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bagi_hasil`
--

INSERT INTO `bagi_hasil` (`id_bagi`, `pihak_1`, `pihak_2`, `created_at`, `updated_at`) VALUES
(1, 60, 40, '2021-07-26 09:00:04', '2021-08-02 08:27:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_transaksi`
--

CREATE TABLE `cart_transaksi` (
  `id_cart` int(3) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `id_pl` int(4) NOT NULL,
  `jumbel` int(4) NOT NULL,
  `sub_total` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart_transaksi`
--

INSERT INTO `cart_transaksi` (`id_cart`, `kode_transaksi`, `id_pl`, `jumbel`, `sub_total`, `created_at`, `updated_at`) VALUES
(287, 'TRX0001', 19, 1, '25000', '2021-07-31 13:37:45', NULL),
(288, 'TRX0001', 13, 1, '21000', '2021-07-31 13:37:47', NULL),
(289, 'TRX0001', 13, 1, '21000', '2021-07-31 13:37:49', NULL),
(290, 'TRX0001', 13, 1, '21000', '2021-07-31 13:37:49', NULL),
(291, 'TRX0001', 13, 1, '21000', '2021-07-31 13:37:50', NULL),
(292, 'TRX0015', 19, 1, '25000', '2021-07-31 13:38:08', NULL),
(293, 'TRX0015', 17, 1, '89000', '2021-07-31 13:38:09', NULL),
(294, 'TRX0015', 17, 1, '89000', '2021-07-31 13:38:10', NULL),
(295, 'TRX0015', 17, 1, '89000', '2021-07-31 13:38:10', NULL),
(296, 'TRX0015', 17, 1, '89000', '2021-07-31 13:38:10', NULL),
(297, 'TRX0015', 17, 1, '89000', '2021-07-31 13:38:11', NULL),
(298, 'TRX0015', 17, 1, '89000', '2021-07-31 13:38:11', NULL),
(299, 'TRX0015', 17, 1, '89000', '2021-07-31 13:38:12', NULL),
(300, 'TRX0015', 17, 1, '89000', '2021-07-31 13:38:12', NULL),
(301, 'TRX0015', 13, 1, '21000', '2021-07-31 13:38:16', NULL),
(302, 'TRX0015', 13, 1, '21000', '2021-07-31 13:38:16', NULL),
(303, 'TRX0015', 13, 1, '21000', '2021-07-31 13:38:17', NULL),
(304, 'TRX0015', 13, 1, '21000', '2021-07-31 13:38:17', NULL),
(305, 'TRX0015', 13, 1, '21000', '2021-07-31 13:38:18', NULL),
(306, 'TRX0015', 14, 1, '78000', '2021-07-31 13:38:19', NULL),
(307, 'TRX0015', 12, 1, '210000', '2021-07-31 13:38:21', NULL),
(308, 'TRX0015', 12, 1, '210000', '2021-07-31 13:38:21', NULL),
(309, 'TRX0015', 12, 1, '210000', '2021-07-31 13:38:22', NULL),
(326, 'TRX0016', 19, 1, '25000', '2021-07-31 14:32:13', NULL),
(327, 'TRX0016', 18, 1, '150000', '2021-07-31 14:32:16', NULL),
(328, 'TRX0016', 17, 1, '89000', '2021-07-31 14:32:17', NULL),
(329, 'TRX0016', 14, 1, '78000', '2021-07-31 14:32:20', NULL),
(330, 'TRX0016', 14, 1, '78000', '2021-07-31 14:32:20', NULL),
(331, 'TRX0016', 14, 1, '78000', '2021-07-31 14:32:21', NULL),
(332, 'TRX0016', 7, 1, '35000', '2021-07-31 14:32:28', NULL),
(333, 'TRX0016', 7, 1, '35000', '2021-07-31 14:32:43', NULL),
(334, 'TRX0016', 7, 1, '35000', '2021-07-31 14:32:45', NULL),
(335, 'TRX0016', 14, 1, '78000', '2021-07-31 14:32:51', NULL),
(336, 'TRX0017', 15, 1, '23000', '2021-07-31 14:34:06', NULL),
(337, 'TRX0017', 13, 1, '21000', '2021-07-31 14:34:10', NULL),
(338, 'TRX0017', 13, 1, '21000', '2021-07-31 14:34:11', NULL),
(351, 'TRX0018', 16, 1, '55000', '2021-08-01 10:12:21', NULL),
(352, 'TRX0018', 18, 1, '150000', '2021-08-01 10:12:34', NULL),
(353, 'TRX0018', 15, 1, '23000', '2021-08-01 10:12:44', NULL),
(354, 'TRX0019', 18, 1, '150000', '2021-08-01 12:33:32', NULL),
(355, 'TRX0019', 2, 1, '80000', '2021-08-01 12:33:37', NULL),
(356, 'TRX0020', 2, 1, '80000', '2021-08-01 12:37:35', NULL),
(357, 'TRX0021', 17, 1, '89000', '2021-08-01 13:53:34', NULL),
(358, 'TRX0022', 17, 1, '89000', '2021-08-01 13:54:08', NULL),
(359, 'TRX0023', 17, 1, '89000', '2021-08-01 13:56:09', NULL),
(360, 'TRX0023', 17, 1, '89000', '2021-08-01 13:56:11', NULL),
(361, 'TRX0024', 17, 1, '89000', '2021-08-01 14:00:18', NULL),
(362, 'TRX0025', 16, 1, '55000', '2021-08-02 08:49:03', NULL),
(363, 'TRX0026', 16, 1, '55000', '2021-08-02 09:02:51', NULL),
(364, 'TRX0027', 9, 1, '90000', '2021-08-02 09:05:58', NULL),
(365, 'TRX0027', 7, 1, '35000', '2021-08-02 09:06:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_layanan`
--

CREATE TABLE `produk_layanan` (
  `id_produk_layanan` int(3) NOT NULL,
  `nama_produk_layanan` varchar(100) NOT NULL,
  `deskripsi_produk_layanan` text DEFAULT NULL,
  `jumlah_item` int(4) NOT NULL DEFAULT 0,
  `harga_item` varchar(20) NOT NULL,
  `foto_produk_layanan` text NOT NULL,
  `jenis` enum('produk','layanan') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_layanan`
--

INSERT INTO `produk_layanan` (`id_produk_layanan`, `nama_produk_layanan`, `deskripsi_produk_layanan`, `jumlah_item`, `harga_item`, `foto_produk_layanan`, `jenis`, `created_at`, `updated_at`) VALUES
(2, 'Hairtatoo edit', 'Trend hair tattoo ini mulai “in” sejak selebriti hollywood terkenal yakni Keylie Jenner menggunakan hair tattoo di rambutnya.', 0, '80000', 'ea5a9c8488595321d8b36dc3eba1bcf0.jpeg', 'layanan', '2021-07-27 06:46:13', '2021-07-27 10:43:12'),
(5, 'Minyak jenggot wak doyok', NULL, 178, '200000', 'abc4e7a7b9b2d4c2a1a7d7ce4f0e7c22.jpeg', 'produk', '2021-07-27 17:14:47', NULL),
(6, 'Tresemme', NULL, 90, '25000', '751a0c9decf6160cdd3cd0ccc0617793.jpeg', 'produk', '2021-07-28 07:49:39', '2021-07-28 08:01:42'),
(7, 'Kahf Relaxing Hair and Body Wash 200 ml', NULL, 180, '35000', 'dbf5347ebe6f52d96a2f3e00a818cf19.jpeg', 'produk', '2021-07-28 07:50:27', NULL),
(8, 'Hairwax day man extra hold', NULL, 20, '45000', '94adcafdf9b6cf23946f010960c8811e.jpeg', 'produk', '2021-07-28 08:04:07', NULL),
(9, 'Hairwax strong hold', NULL, 30, '90000', '4b622c48e42a378f54f4c6807aff09aa.jpeg', 'produk', '2021-07-28 08:05:00', NULL),
(10, 'Gillette Krim Cukur Foamy Shaving Cream Lemon Lime 50 Gram', NULL, 80, '23500', '8730f4cf8f5633818fec3853ca2d761b.jpeg', 'produk', '2021-07-28 08:09:40', NULL),
(11, 'Barbasol Thick and Rich Shaving Cream, Original 10 oz (Pack of 3)', NULL, 89, '1126400', '390935dafc578b11b897b425d08af0ba.jpeg', 'produk', '2021-07-28 08:11:18', NULL),
(12, 'Electric Shaver Razor', NULL, 30, '210000', 'faa8f7f1b8324b8b211476ec9b43782f.jpeg', 'produk', '2021-07-28 08:54:00', '2021-08-02 14:16:16'),
(13, 'Gillete March 3', NULL, 23, '21000', 'db92c05c69349ef4f11ea981f909d4d2.jpeg', 'produk', '2021-07-28 08:54:44', NULL),
(14, 'Natur Conditioner', NULL, 89, '78000', 'a647156147a9b7df8eef8fdcce183cd7.png', 'produk', '2021-07-28 08:58:23', NULL),
(15, 'Pijat relaksasi kepala', 'Pijat kepala setelah cukur', 0, '23000', '229019e708ed32d93372eb61042103bb.jpeg', 'layanan', '2021-07-28 09:00:52', NULL),
(16, 'Terapi Handuk hangat', 'Terapi handuk hangat setelah cukur', 0, '55000', '1caad243d24510359daf5333ec746d54.jpeg', 'layanan', '2021-07-28 09:02:03', NULL),
(17, 'Styling pomade/ hairstyling', 'Styling rambut menggunakan pomade setelah cukur', 0, '89000', '8746c3d7841ab2182a17cca93f92b754.jpeg', 'layanan', '2021-07-28 09:03:47', '2021-07-28 09:04:03'),
(18, 'Shaving cream', 'Layanan cukur jenggot dengan shaving cream', 0, '150000', 'e608716d33854c144eca36ba39af77a2.jpeg', 'layanan', '2021-07-28 10:24:07', NULL),
(19, 'CUCI rambut', 'Cuci rambut setelah cukur', 0, '25000', 'd21c6200ac791921dd57eb55b1623e96.jpeg', 'layanan', '2021-07-28 10:27:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(3) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `id_user` int(3) NOT NULL,
  `total` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_user`, `total`, `created_at`, `updated_at`) VALUES
(14, 'TRX0001', 1, '109000', '2021-07-31 13:37:53', NULL),
(15, 'TRX0015', 1, '1550000', '2021-07-31 13:38:24', NULL),
(16, 'TRX0016', 1, '681000', '2021-07-31 14:33:15', NULL),
(17, 'TRX0017', 1, '65000', '2021-07-31 14:34:14', NULL),
(18, 'TRX0018', 1, '228000', '2021-08-01 10:12:51', NULL),
(19, 'TRX0019', 21, '230000', '2021-08-01 12:33:50', NULL),
(20, 'TRX0020', 21, '80000', '2021-08-01 12:37:41', NULL),
(21, 'TRX0021', 1, '89000', '2021-08-01 13:53:42', NULL),
(22, 'TRX0022', 22, '89000', '2021-08-01 13:54:27', NULL),
(23, 'TRX0023', 22, '178000', '2021-08-01 13:56:13', NULL),
(24, 'TRX0024', 21, '89000', '2021-08-01 14:00:28', NULL),
(25, 'TRX0025', 21, '55000', '2021-08-02 08:49:08', NULL),
(26, 'TRX0026', 21, '55000', '2021-08-02 09:02:54', NULL),
(27, 'TRX0027', 22, '125000', '2021-08-02 09:06:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '$2y$10$N33og08eYBFZlPT8unPeYe7D.xxoropy2OniU3jsN3Cb0iuUIGuae',
  `user_status` enum('owner','karyawan') NOT NULL DEFAULT 'karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `jenkel`, `alamat`, `no_telpon`, `username`, `password`, `user_status`) VALUES
(1, 'Administrator', 'L', '', '-', 'owner', '$2y$10$611DW2wlBplpEwqN5G6UG.QVwvEbop7kFWoim1Ao9UWalj2xuj2LG', 'owner'),
(21, 'Afonda Once Mekel', 'L', 'Jl. Dusun 01', '081211', 'once', '$2y$10$fl8w5y5bM3bp70GRJG18zu1JicR9DbSjj.8f3UF/m1R1mlWafxEK6', 'karyawan'),
(22, 'Tes karyawan 3', 'P', 'Alamat rumah', '0987643', 'tes3', '$2y$10$1PBRM7/6gCSd/MyYxCmLMecLk9P0BGh4W/.wpLMp1ztgprJbg5Ja6', 'karyawan');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_keranjang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_keranjang` (
`id_produk_layanan` int(3)
,`nama_produk_layanan` varchar(100)
,`harga_item` varchar(20)
,`jenis` enum('produk','layanan')
,`id_cart` int(3)
,`kode_transaksi` varchar(100)
,`kuantitas` decimal(32,0)
,`subtotal` double
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_total`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_total` (
`kode_transaksi` varchar(100)
,`total` double
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_keranjang`
--
DROP TABLE IF EXISTS `v_keranjang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_keranjang`  AS  select `produk_layanan`.`id_produk_layanan` AS `id_produk_layanan`,`produk_layanan`.`nama_produk_layanan` AS `nama_produk_layanan`,`produk_layanan`.`harga_item` AS `harga_item`,`produk_layanan`.`jenis` AS `jenis`,`cart_transaksi`.`id_cart` AS `id_cart`,`cart_transaksi`.`kode_transaksi` AS `kode_transaksi`,sum(`cart_transaksi`.`jumbel`) AS `kuantitas`,sum(`cart_transaksi`.`sub_total`) AS `subtotal` from (`cart_transaksi` join `produk_layanan` on(`produk_layanan`.`id_produk_layanan` = `cart_transaksi`.`id_pl`)) group by `cart_transaksi`.`id_pl` order by `cart_transaksi`.`id_cart` desc ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_total`
--
DROP TABLE IF EXISTS `v_total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_total`  AS  select `cart_transaksi`.`kode_transaksi` AS `kode_transaksi`,sum(`cart_transaksi`.`sub_total`) AS `total` from `cart_transaksi` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bagi_hasil`
--
ALTER TABLE `bagi_hasil`
  ADD PRIMARY KEY (`id_bagi`);

--
-- Indeks untuk tabel `cart_transaksi`
--
ALTER TABLE `cart_transaksi`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `produk_layanan`
--
ALTER TABLE `produk_layanan`
  ADD PRIMARY KEY (`id_produk_layanan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bagi_hasil`
--
ALTER TABLE `bagi_hasil`
  MODIFY `id_bagi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cart_transaksi`
--
ALTER TABLE `cart_transaksi`
  MODIFY `id_cart` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT untuk tabel `produk_layanan`
--
ALTER TABLE `produk_layanan`
  MODIFY `id_produk_layanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
