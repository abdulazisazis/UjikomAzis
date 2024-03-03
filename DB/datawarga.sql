-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2024 pada 07.59
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datawarga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datawarga`
--

CREATE TABLE `datawarga` (
  `no` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` enum('pria','wanita') NOT NULL,
  `tempat_tanggallahir` varchar(100) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `no_kk` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `umur` varchar(25) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datawarga`
--

INSERT INTO `datawarga` (`no`, `nama`, `jeniskelamin`, `tempat_tanggallahir`, `agama`, `no_kk`, `alamat`, `umur`, `waktu`, `tanggal`) VALUES
(86, 'sahrul', 'pria', 'hari kiamat', 'islam', 1234, 'kampung gawir', '17', '2024-02-27 03:27:33', '2024-02-27'),
(87, 'azisss', 'pria', 'bandung 12 april 2006', 'islam', 1234, 'pasirpanjang', '17', '2024-02-28 03:55:56', '2024-02-28'),
(88, 'isan', 'pria', 'bandung', 'islam', 123, 'kampung', '76 year old', '2024-02-29 06:21:27', '2024-02-29'),
(89, 'azisss', 'pria', 'bandung 12 april 2006', 'islam', 123, 'pasirpanjang', '17', '2024-02-29 06:45:11', '2024-02-29'),
(90, 'azisss', 'pria', 'bandung', 'islam', 123456, 'pasirpanjang', '76 year old', '2024-02-29 07:39:34', '2024-02-29'),
(91, 'isan', 'pria', 'hari kiamat', 'islam', 1234, 'pasirpanjang', '76 year old', '2024-02-29 07:39:54', '2024-02-29'),
(95, 'isan', 'wanita', 'bandung', 'kristen', 123, 'kampung', '17', '2024-02-29 07:23:46', '2024-02-29'),
(96, 'isan', 'wanita', 'bandung', 'kristen', 123, 'pasirpanjang', '76 year old', '2024-02-29 07:39:42', '2024-02-29'),
(97, 'isan', 'pria', 'hari kiamat', 'islam', 123, 'kampung', '76 year old', '2024-02-29 07:40:16', '2024-02-29'),
(99, 'aril', 'wanita', 'bandung', 'islam', 123, 'kota', '17', '2024-03-01 02:04:59', '2024-03-01'),
(100, 'aldi', 'wanita', 'hari kiamat', 'islam', 1234, 'kota', '76 year old', '2024-03-01 03:17:45', '2024-03-01'),
(101, 'isan', 'wanita', 'bandung', 'islam', 1234, 'pasirpanjang', '17', '2024-03-01 03:33:48', '2024-03-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `no` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`no`, `user`, `pass`) VALUES
(1, 'admin', 'admin123'),
(2, 'azis', '123'),
(3, 'aziss', '12345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datawarga`
--
ALTER TABLE `datawarga`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datawarga`
--
ALTER TABLE `datawarga`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
