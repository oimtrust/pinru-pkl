-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2018 at 10:49 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pinru_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text,
  `status` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'oimtrust', 'ac43724f16e9241d990427ab7c8f4228', 'admin', '2018-01-25 17:13:14', '2018-01-29 16:38:25'),
(2, 'approve', 'ac43724f16e9241d990427ab7c8f4228', 'approve', '2018-01-29 17:56:54', '2018-01-30 09:13:27'),
(4, 'admin', 'ac43724f16e9241d990427ab7c8f4228', 'admin', '2018-01-30 09:32:01', '2018-01-30 09:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fakultas`
--

INSERT INTO `tbl_fakultas` (`id_fakultas`, `nama_fakultas`, `created_at`, `updated_at`) VALUES
(1, 'Ilmu Pendidikan', '2018-01-25 17:59:20', '2018-01-25 17:59:20'),
(2, 'Ekonomika dan Bisnis', '2018-01-25 18:51:09', '2018-01-25 18:51:45'),
(3, 'Sains dan Teknologi', '2018-01-27 21:35:35', '2018-01-27 21:35:35'),
(4, 'Ilmu Hukum', '2018-01-27 21:35:49', '2018-01-27 21:35:49'),
(5, 'Peternakan', '2018-01-27 21:37:32', '2018-01-27 21:37:32'),
(6, 'Bahasa dan Sastra', '2018-01-27 21:37:45', '2018-01-27 21:37:45'),
(7, 'Program Pasca Sarjana', '2018-01-27 21:38:00', '2018-01-27 21:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hari`
--

CREATE TABLE `tbl_hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hari`
--

INSERT INTO `tbl_hari` (`id_hari`, `nama_hari`, `created_at`, `updated_at`) VALUES
(1, 'Senin', '2018-02-05 17:24:06', '2018-02-05 17:24:06'),
(2, 'Selasa', '2018-02-05 17:25:38', '2018-02-05 17:26:49'),
(3, 'Rabu', '2018-02-05 17:25:38', '2018-02-05 17:27:12'),
(4, 'Kamis', '2018-02-05 17:25:38', '2018-02-05 17:27:21'),
(5, 'Jumat', '2018-02-05 17:25:38', '2018-02-05 17:27:30'),
(6, 'Sabtu', '2018-02-05 17:25:38', '2018-02-05 17:27:38'),
(7, 'Minggu', '2018-02-05 17:27:55', '2018-02-05 17:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjaman`, `id_user`, `id_ruang`, `id_hari`, `tgl_pinjam`, `jam_awal`, `jam_akhir`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 12345, 2, 2, '2018-02-06', '08:00:00', '11:00:00', 'Workshop Mobile', 'DITERIMA', '2018-02-05 15:09:30', '2018-02-05 17:29:19'),
(2, 12354, 3, 3, '2018-02-07', '08:00:00', '10:00:00', 'Rapart', 'DITERIMA', '2018-02-06 11:35:50', '2018-02-06 11:35:50'),
(3, 12345, 2, 7, '2018-02-11', '08:30:00', '10:00:00', 'Temu Akrab', 'DITOLAK', '2018-02-08 22:10:52', '2018-02-08 22:10:52'),
(4, 12354, 1, 2, '2018-02-13', '09:00:00', '12:00:00', 'Pelatihan', 'DITERIMA', '2018-02-08 23:22:18', '2018-02-08 23:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `nama_prodi`, `id_fakultas`, `created_at`, `updated_at`) VALUES
(1, 'Bimbingan dan Konseling', 1, '2018-01-26 09:20:06', '2018-01-26 09:20:06'),
(2, 'Pendidikan Geografi', 1, '2018-01-26 09:21:08', '2018-01-26 10:15:43'),
(3, 'PGPAUD', 1, '2018-01-27 21:56:03', '2018-01-27 21:56:03'),
(4, 'PGSD', 1, '2018-01-27 21:58:09', '2018-01-27 21:58:09'),
(5, 'PPKn', 1, '2018-01-27 21:58:28', '2018-01-27 21:58:28'),
(6, 'Manajemen', 2, '2018-01-27 22:00:08', '2018-01-27 22:00:08'),
(7, 'Akuntansi', 2, '2018-01-27 22:00:24', '2018-01-27 22:00:24'),
(8, 'Pendidikan Ekonomi', 2, '2018-01-27 22:03:49', '2018-01-27 22:03:49'),
(9, 'Magister Manajemen', 2, '2018-01-27 22:05:53', '2018-01-27 22:05:53'),
(10, 'Sistem Informasi', 3, '2018-01-27 22:06:16', '2018-01-27 22:06:16'),
(11, 'Teknik Informatika', 3, '2018-01-27 22:10:09', '2018-01-27 22:10:09'),
(12, 'Pendidikan Fisika', 3, '2018-01-27 22:25:08', '2018-01-27 22:25:08'),
(13, 'Pendidikan Matematika', 3, '2018-01-27 22:31:28', '2018-01-27 22:31:28'),
(14, 'Ilmu Hukum', 4, '2018-01-27 22:32:59', '2018-01-27 22:32:59'),
(15, 'Peternakan', 5, '2018-01-27 22:33:40', '2018-01-27 22:33:40'),
(16, 'Sastra Inggris', 6, '2018-01-27 22:34:36', '2018-01-27 22:34:36'),
(17, 'Pendidikan Bahasa dan Sastra Indonesia', 6, '2018-01-27 22:35:03', '2018-01-27 22:35:03'),
(18, 'Pendidikan Bahasa Inggris', 6, '2018-01-27 22:35:25', '2018-01-27 22:35:25'),
(19, 'Magister Pendidikan IPS', 7, '2018-01-27 22:36:24', '2018-01-27 22:36:24'),
(20, 'Magister Manajemen', 7, '2018-01-27 22:36:44', '2018-01-27 22:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruang`
--

CREATE TABLE `tbl_ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'KOSONG',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruang`
--

INSERT INTO `tbl_ruang` (`id_ruang`, `nama_ruang`, `status`, `created_at`, `updated_at`) VALUES
(1, 'J1', 'TERPAKAI', '2018-01-26 22:13:10', '2018-02-08 23:22:18'),
(2, 'J2', 'TERPAKAI', '2018-01-26 22:17:16', '2018-02-05 15:09:30'),
(3, 'J3', 'TERPAKAI', '2018-01-27 22:37:54', '2018-02-06 11:35:51'),
(4, 'J4', 'KOSONG', '2018-01-27 22:37:58', '2018-01-27 22:37:58'),
(5, 'J5', 'KOSONG', '2018-01-27 22:38:00', '2018-01-27 22:38:00'),
(6, 'J6', 'KOSONG', '2018-01-27 22:38:03', '2018-01-27 22:38:03'),
(7, 'J7', 'KOSONG', '2018-01-27 22:38:06', '2018-01-27 22:38:06'),
(8, 'J8', 'KOSONG', '2018-01-27 22:38:09', '2018-01-27 22:38:09'),
(9, 'J9', 'KOSONG', '2018-01-27 22:38:11', '2018-01-27 22:38:11'),
(10, 'J10', 'KOSONG', '2018-01-27 22:38:14', '2018-01-27 22:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(15) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `password`, `nama_user`, `id_fakultas`, `id_prodi`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(11111, 'ac43724f16e9241d990427ab7c8f4228', 'Ridho', 3, 11, 'Bengkulu', 'Tidak Tetap', '2018-01-28 10:39:16', '2018-01-28 11:12:31'),
(12345, 'ac43724f16e9241d990427ab7c8f4228', 'Fathur Rohim', 1, 1, 'Malang', 'Tetap', '2018-01-27 21:29:01', '2018-01-27 21:29:01'),
(12354, 'ac43724f16e9241d990427ab7c8f4228', 'Lonita Damayanti', 1, 4, 'Curup', 'Tetap', '2018-01-27 22:42:53', '2018-01-27 22:42:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tbl_hari`
--
ALTER TABLE `tbl_hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tbl_ruang`
--
ALTER TABLE `tbl_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_hari`
--
ALTER TABLE `tbl_hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_ruang`
--
ALTER TABLE `tbl_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
