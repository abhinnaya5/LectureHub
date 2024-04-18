-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Apr 2024 pada 12.05
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20_dblecture_hub`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjenis`
--

CREATE TABLE `tbjenis` (
  `id_jenis` int(10) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbjenis`
--

INSERT INTO `tbjenis` (`id_jenis`, `jenis`) VALUES
(1, 'Lecture'),
(2, 'Tutorial'),
(3, 'Keynote'),
(4, 'Demonstration'),
(5, 'Opening'),
(6, 'Interview');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkategori`
--

CREATE TABLE `tbkategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbkategori`
--

INSERT INTO `tbkategori` (`id_kategori`, `nama_kategori`, `gambar`) VALUES
(1, 'Computer Science', 'cat-1.jpg'),
(2, 'Business', 'cat-2.jpg'),
(3, 'Biology', 'cat-3.jpg'),
(4, 'Humanities', 'cat-4.jpg'),
(5, 'Medicine', 'cat-5.jpg'),
(6, 'Arts', 'cat-6.jpg'),
(7, 'Content Writing', 'cat-7.jpg'),
(8, 'SEO', 'cat-8.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbriwayat`
--

CREATE TABLE `tbriwayat` (
  `id_riwayat` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_video` int(10) NOT NULL,
  `masuk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbriwayat`
--

INSERT INTO `tbriwayat` (`id_riwayat`, `id_user`, `id_video`, `masuk`) VALUES
(1, 2, 3, '2024-04-02 01:31:34'),
(2, 2, 3, '2024-04-02 01:31:47'),
(3, 2, 3, '2024-04-02 01:46:15'),
(4, 2, 9, '2024-04-02 01:48:46'),
(5, 2, 6, '2024-04-02 01:49:02'),
(6, 2, 9, '2024-04-02 01:49:04'),
(7, 2, 7, '2024-04-02 01:49:05'),
(8, 2, 5, '2024-04-02 01:49:06'),
(9, 2, 8, '2024-04-02 01:49:08'),
(10, 2, 8, '2024-04-02 01:49:09'),
(11, 2, 9, '2024-04-02 01:49:10'),
(12, 2, 6, '2024-04-02 01:49:11'),
(13, 2, 7, '2024-04-02 01:49:12'),
(14, 2, 8, '2024-04-02 01:49:13'),
(15, 3, 5, '2024-04-02 09:25:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `repassword` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`id_user`, `nama`, `username`, `email`, `password`, `repassword`, `gambar`, `level`) VALUES
(1, 'Abam', 'admin', 'admin@gmail.com', 'admin', '', 'avatar3.png', 'Admin'),
(2, 'Jony Beef', 'jony', 'jony@gmail.com', 'jony', 'jony', 'avatar3.png', 'Member'),
(3, 'Antok', 'antok', 'antok@gmail.com', 'antok', 'antok', 'avatar3.png', 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbvideo`
--

CREATE TABLE `tbvideo` (
  `id_video` int(10) NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `tahun` int(4) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `berkas` varchar(100) NOT NULL,
  `tampil` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbvideo`
--

INSERT INTO `tbvideo` (`id_video`, `waktu`, `id_user`, `id_kategori`, `id_jenis`, `tahun`, `judul`, `deskripsi`, `berkas`, `tampil`) VALUES
(3, '2024-03-15', 2, 1, 1, 2024, 'Game For Children from youtube', 'Game For Children', 'amb.mp4', 3),
(5, '2024-03-20', 2, 8, 5, 2024, 'Learn SEO from scratch and from zero.', 'Learn SEO from scratch and from zero. What are the preparations like? Watch until the end', 'ilmuseo.mp4', 2),
(6, '2024-03-21', 2, 2, 6, 2024, 'I Got Rich When I Understood This | Jeff Bezos', 'I Got Rich When I Understood This | Jeff Bezos', 'busines.mp4', 2),
(7, '2024-04-02', 2, 3, 4, 2024, 'Heart Dissection GCSE A Level Biology NEET Practical Skills', 'Heart Dissection GCSE A Level Biology NEET Practical Skills', 'heart.mp4', 2),
(8, '2024-04-02', 2, 7, 3, 2024, 'How To Become A Content Writer', 'How To Become A Content Writer', 'content.mp4', 3),
(9, '2024-04-02', 2, 5, 6, 2024, 'How I Memorized EVERYTHING in MEDICAL SCHOOL ', 'How I Memorized EVERYTHING in MEDICAL SCHOOL - (3 Easy TIPS)', 'medi.mp4', 3),
(10, '2024-04-02', 3, 8, 2, 2024, 'How to beat the applicant tracking system in 2023', 'How to beat the applicant tracking system in 2023 (UPDATED)', 'how.mp4', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbjenis`
--
ALTER TABLE `tbjenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbriwayat`
--
ALTER TABLE `tbriwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbvideo`
--
ALTER TABLE `tbvideo`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbjenis`
--
ALTER TABLE `tbjenis`
  MODIFY `id_jenis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbriwayat`
--
ALTER TABLE `tbriwayat`
  MODIFY `id_riwayat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbvideo`
--
ALTER TABLE `tbvideo`
  MODIFY `id_video` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
