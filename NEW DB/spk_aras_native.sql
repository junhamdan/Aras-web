-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2024 pada 06.02
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
-- Database: `spk_aras_native`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`) VALUES
(1, 'Hafiz Sitepu'),
(2, 'Ahmad Rahmad'),
(3, 'Heru Pranata'),
(4, 'Agung Alponi'),
(5, 'Dika Radit'),
(6, 'Dwi Susanto'),
(7, 'Dandi Ilyas'),
(8, 'Andreas'),
(9, 'Derry Akbar'),
(10, 'Rico Zahiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai`) VALUES
(1, 1, 0.642209),
(2, 2, 0.793306),
(3, 3, 0.583586),
(4, 4, 0.666414),
(5, 5, 0.941377),
(6, 6, 0.583586),
(7, 7, 0.308623),
(8, 8, 0.916414),
(9, 9, 0.456694),
(10, 10, 0.846067);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `type` enum('Benefit','Cost') NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama`, `type`, `bobot`) VALUES
(1, 'C1', 'Kemampuan Network Management', 'Benefit', 0.25),
(2, 'C2', 'Kemampuan Server Management', 'Benefit', 0.25),
(3, 'C3', 'Kemampuan Cloud Computing', 'Benefit', 0.25),
(4, 'C4', 'Kerjasama Tim', 'Benefit', 0.1),
(5, 'C5', 'Kemampuan Troubleshoot', 'Benefit', 0.15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, 78),
(2, 1, 2, 90),
(3, 1, 3, 65),
(4, 1, 4, 87),
(5, 1, 5, 73),
(6, 2, 1, 85),
(7, 2, 2, 78),
(8, 2, 3, 92),
(9, 2, 4, 80),
(10, 2, 5, 95),
(11, 3, 1, 70),
(12, 3, 2, 88),
(13, 3, 3, 75),
(14, 3, 4, 85),
(15, 3, 5, 72),
(16, 4, 1, 82),
(17, 4, 2, 75),
(18, 4, 3, 80),
(19, 4, 4, 78),
(20, 4, 5, 85),
(21, 5, 1, 95),
(22, 5, 2, 88),
(23, 5, 3, 92),
(24, 5, 4, 90),
(25, 5, 5, 94),
(26, 6, 1, 77),
(27, 6, 2, 83),
(28, 6, 3, 78),
(29, 6, 4, 80),
(30, 6, 5, 79),
(31, 7, 1, 58),
(32, 7, 2, 75),
(33, 7, 3, 50),
(34, 7, 4, 52),
(35, 7, 5, 55),
(36, 8, 1, 90),
(37, 8, 2, 85),
(38, 8, 3, 92),
(39, 8, 4, 88),
(40, 8, 5, 95),
(41, 9, 1, 72),
(42, 9, 2, 88),
(43, 9, 3, 58),
(44, 9, 4, 75),
(45, 9, 5, 50),
(46, 10, 1, 88),
(47, 10, 2, 92),
(48, 10, 3, 85),
(49, 10, 4, 89),
(50, 10, 5, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `operator` int(1) NOT NULL,
  `a` float DEFAULT NULL,
  `b` float DEFAULT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `nama`, `operator`, `a`, `b`, `nilai`) VALUES
(1, 1, 'Sangat Baik', 3, 90, 100, 4),
(2, 1, 'Baik', 3, 80, 89, 3),
(3, 1, 'Cukup', 3, 60, 79, 2),
(4, 1, 'Kurang Baik', 2, 60, 0, 1),
(5, 2, 'Sangat Baik', 3, 90, 100, 4),
(6, 2, 'Baik', 3, 80, 89, 3),
(7, 2, 'Cukup', 3, 60, 79, 2),
(8, 2, 'Kurang Baik', 2, 60, 0, 1),
(9, 3, 'Sangat Baik', 3, 90, 100, 4),
(10, 3, 'Baik', 3, 80, 89, 3),
(11, 3, 'Cukup', 3, 60, 79, 2),
(12, 3, 'Kurang Baik', 2, 60, 0, 1),
(13, 4, 'Sangat Baik', 3, 90, 100, 4),
(14, 4, 'Baik', 3, 80, 89, 3),
(15, 4, 'Cukup', 3, 60, 79, 2),
(16, 4, 'Kurang Baik', 2, 60, 0, 1),
(17, 5, 'Sangat Baik', 3, 90, 100, 4),
(18, 5, 'Baik', 3, 80, 89, 3),
(19, 5, 'Cukup', 3, 60, 79, 2),
(20, 5, 'Kurang Baik', 2, 60, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'admin@gmail.com', '1'),
(8, 'user', '12dea96fec20593566ab75692c9949596833adc9', 'User', 'user@gmail.com', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
