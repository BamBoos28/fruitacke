-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2023 pada 13.42
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
-- Database: `db_bakery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesan`
--

CREATE TABLE `detail_pemesan` (
  `id_detail_pemesan` int(11) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_pemesan`
--

INSERT INTO `detail_pemesan` (`id_detail_pemesan`, `id_pemesan`, `username`, `id_produk`, `jumlah_produk`) VALUES
(36, 16, 'user', 7, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesan`
--

CREATE TABLE `pemesan` (
  `id_pemesan` int(11) NOT NULL,
  `tanggal_pemesan` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesan`
--

INSERT INTO `pemesan` (`id_pemesan`, `tanggal_pemesan`, `total_harga`, `total_bayar`) VALUES
(16, '2023-06-25', 400000, 412000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(64) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `jenis_produk` varchar(64) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `gambar` varchar(64) NOT NULL,
  `best` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `jenis_produk`, `stok`, `harga`, `gambar`, `best`) VALUES
(28, 'Roti Cinnamon', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Roti', 20, 15000, 'b-cinamon.png', 1),
(29, 'Roti Croissant', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Roti', 24, 32000, 'b-kroisan.png', 0),
(30, 'Pizza Tuna Keju', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Roti', 10, 45000, 'b-pizza.png', 1),
(31, 'Sandwich Daging Asap', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Roti', 21, 25000, 'b-sandwitch.png', 0),
(32, 'Roti Sosis Sapi', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Roti', 54, 10000, 'b-sausage.png', 1),
(33, 'Kue Keju', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Kue', 12, 35000, 'c-cheese.png', 0),
(34, 'Kue Coklat', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Kue', 12, 32000, 'c-coklat.png', 1),
(35, 'Kue Mocca', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Kue', 12, 44000, 'c-mocca.png', 0),
(36, 'Kue Oreo', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Kue', 12, 35000, 'c-oreo.png', 0),
(37, 'Kue Strawberry', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Kue', 12, 38000, 'c-strawberry.png', 0),
(38, 'Donat Almond', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Donat', 42, 12000, 'd-almon.png', 1),
(39, 'Donat Coklat', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Donat', 56, 8000, 'd-coklat.png', 0),
(40, 'Donat Kacang', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Donat', 50, 9000, 'd-nut.png', 0),
(41, 'Donat Strawberry', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At nihil dolorum doloribus illo, non recusandae nostrum error doloremque, architecto neque maiores quod velit aperiam? Quisquam velit accusantium atque ad nihil.', 'Donat', 42, 12000, 'd-strawberry.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `jenis_kelamin` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `no_tlp` char(12) NOT NULL,
  `role` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `no_tlp`, `role`) VALUES
(13, 'admin', '$2y$10$W.TrrhrvpRKI74UfNdPHS.1fwhiYMuLKHd1oArSn/CNfvHLsk2zXq', 'Zuliyanto', 'laki-laki', '2003-05-26', 'getassrabi', '08977979474', 'admin'),
(14, 'user', '$2y$10$AyqjE8yRxBIQzwAzrM190uSj2oaNxPVAuo21oDqPNIVH6RuUxZV5W', 'user', 'laki-laki', '2023-06-01', 'fsdfsfsfsf', '3234234243', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pemesan`
--
ALTER TABLE `detail_pemesan`
  ADD PRIMARY KEY (`id_detail_pemesan`);

--
-- Indeks untuk tabel `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id_pemesan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pemesan`
--
ALTER TABLE `detail_pemesan`
  MODIFY `id_detail_pemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id_pemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
