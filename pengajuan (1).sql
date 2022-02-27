-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2022 pada 08.24
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengajuan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `id_level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_petugas`, `nama_petugas`, `username`, `password`, `tlp`, `id_level`) VALUES
(1, 'hasan1233', 'hasan1233', '$2y$10$ryG7js5bwtFhh0j6t64GEuZXBh5Do2JsgkBsamAUqb3yH63T5CkWq', '2873827323', 2),
(7, 'hasan', 'hasan', '$2y$10$wBq/Zqi9toTUq.v.NkZwk.QyBZ4K8R3zRBtLhZ.VR8v4addWkFdcW', '73827382', 1),
(9, 'rfdsgdfg', 'rfgfdgdg', '$2y$10$9L5aXMl.3M3WS8jP6uzpV.2aAjW.xiRkBy7n39iEhoDGWrZQtlr8u', '1234567689097', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama`) VALUES
(1, 'petugas'),
(2, 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(250) NOT NULL,
  `status` enum('proses','selesai','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `judul`, `isi`, `foto`, `status`) VALUES
(1, '2022-02-17', '12345678', 'asadsd', 'swdsds', '7b98d6a4066799da28a024bf0122d89f.jpg', 'selesai'),
(2, '2022-02-16', '12345678', 'sdsdsds', 'dxcdxcdc', '7b98d6a4066799da28a024bf0122d89f.jpg', 'selesai'),
(3, '2022-02-02', '12345678', 'sdsdsdsd', 'sswswswswswswwsdsdsdsdsdsd sdcdssdwsdwdwwdwdwdw sswswswswswswwsdsdsdsdsdsd sdcdssdwsdwdwwdwdwdw sswswswswswswwsdsdsdsdsdsd sdcdssdwsdwdwwdwdwdw', '7b98d6a4066799da28a024bf0122d89f.jpg', 'ditolak'),
(4, '2022-02-02', '12345678', 'sdsdsdsd', 'edfrewrfewgfewrgfrwegdrfrf edfrewrfewgfewrgfrwegdrfrfedfrewrfewgfewrgfrwegdrfrf edfrewrfewgfewrgfrwegdrfrf', '7b98d6a4066799da28a024bf0122d89f.jpg', 'selesai'),
(7, '2022-02-23', '12345678', 'fdsfsrdf', 'wdwdwqed', '7b98d6a4066799da28a024bf0122d89f.jpg', 'proses'),
(9, '2022-02-03', '12345678', 'efefwefwef', 'hehfdjefhn efjnejf ejfnejf ejfjnejfn ekfjkejf', '1643873518_8bc733c5f3d28ac5e81c.jpg', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(1, 2, '2022-02-10', 'tes', 1),
(9, 4, '2022-02-02', 'dwsdsds', 7),
(10, 1, '2022-02-03', 'AASASASASA', 7),
(11, 3, '2022-02-03', 'REWRDEWFDEW', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nik` char(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `tlp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nik`, `nama`, `email`, `username`, `password`, `tlp`, `alamat`, `profil`) VALUES
('12345678', 'fdsfds', 'hasan@gmail.com', 'hasann', '$2y$10$9Q86IrCMcSdIpWYo/GPS1epELpl4ZzkvySNcIIOVXPM9rbrZJxx0y', '343242343', 'sdsadsa', '1644417459_ff25a583cb5eda873bfc.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
