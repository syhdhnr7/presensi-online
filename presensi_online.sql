-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2024 pada 18.38
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
-- Database: `presensi_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datasiswa`
--

CREATE TABLE `datasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` enum('Hadir','Izin','Sakit','Alpha') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datasiswa`
--

INSERT INTO `datasiswa` (`id`, `nama`, `nis`, `tanggal`, `ket`) VALUES
(134, 'Aditia Pratama', '2023001', '2024-06-08', 'Hadir'),
(135, 'Budi Santoso', '2023002', '2024-06-08', 'Hadir'),
(136, 'Citra Dewi', '2023003', '2024-06-08', 'Hadir'),
(137, 'Dewi Lestari', '2023004', '2024-06-08', 'Hadir'),
(138, 'Eko Prasetyo', '2023005', '2024-06-08', 'Hadir'),
(139, 'Fajar Nugroho', '2023006', '2024-06-08', 'Alpha'),
(140, 'Gita Ramadhani', '2023007', '2024-06-08', 'Hadir'),
(141, 'Hendra Wijaya', '2023008', '2024-06-08', 'Hadir'),
(142, 'Indah Permata', '2023009', '2024-06-08', 'Hadir'),
(143, 'Joko Susilo', '2023010', '2024-06-08', 'Hadir'),
(144, 'Aditia Pratama', '2023001', '2024-07-05', 'Hadir'),
(145, 'Budi Santoso', '2023002', '2024-07-05', 'Hadir'),
(146, 'Citra Dewi', '2023003', '2024-07-05', 'Hadir'),
(147, 'Dewi Lestari', '2023004', '2024-07-05', 'Hadir'),
(148, 'Eko Prasetyo', '2023005', '2024-07-05', 'Hadir'),
(149, 'Fajar Nugroho', '2023006', '2024-07-05', 'Hadir'),
(150, 'Gita Ramadhani', '2023007', '2024-07-05', 'Hadir'),
(151, 'Hendra Wijaya', '2023008', '2024-07-05', 'Hadir'),
(152, 'Indah Permata', '2023009', '2024-07-05', 'Hadir'),
(153, 'Joko Susilo', '2023010', '2024-07-05', 'Hadir'),
(154, 'Aditia Pratama', '2023001', '2024-06-28', 'Sakit'),
(155, 'Budi Santoso', '2023002', '2024-06-28', 'Hadir'),
(156, 'Citra Dewi', '2023003', '2024-06-28', 'Hadir'),
(157, 'Dewi Lestari', '2023004', '2024-06-28', 'Hadir'),
(158, 'Eko Prasetyo', '2023005', '2024-06-28', 'Hadir'),
(159, 'Fajar Nugroho', '2023006', '2024-06-28', 'Hadir'),
(160, 'Gita Ramadhani', '2023007', '2024-06-28', 'Hadir'),
(161, 'Hendra Wijaya', '2023008', '2024-06-28', 'Hadir'),
(162, 'Indah Permata', '2023009', '2024-06-28', 'Hadir'),
(163, 'Joko Susilo', '2023010', '2024-06-28', 'Hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `materi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `materi`, `tanggal`) VALUES
(14, 'HTML', '2024-06-08'),
(15, 'CSS', '2024-07-05'),
(16, 'JavaScript', '2024-06-28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datasiswa`
--
ALTER TABLE `datasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_nis_tanggal` (`nis`,`tanggal`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datasiswa`
--
ALTER TABLE `datasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
