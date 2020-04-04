-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 01:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kamera`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kamera`
--

CREATE TABLE `tbl_kamera` (
  `id_kamera` int(11) NOT NULL,
  `nama_kamera` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kamera`
--

INSERT INTO `tbl_kamera` (`id_kamera`, `nama_kamera`, `warna`, `update_time`) VALUES
(1, 'canon', '#ff0000', '2020-03-23 02:10:24'),
(2, 'nikon', '#ff0080', '2020-03-23 02:10:39'),
(3, 'sony', '#80ffff', '2020-03-23 02:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_pemesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `id_kamera` int(11) NOT NULL,
  `id_tipe_kamera` int(11) NOT NULL,
  `waktu_pemesanan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `waktu_pengambilan` datetime NOT NULL,
  `waktu_pengembalian` datetime NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `status_pinjaman` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_pemesanan`, `nama_pemesan`, `alamat`, `no_hp`, `id_kamera`, `id_tipe_kamera`, `waktu_pemesanan`, `waktu_pengambilan`, `waktu_pengembalian`, `keterangan`, `status_pinjaman`) VALUES
(1, 'choi', 'jember', '082312314', 1, 1, '2020-03-23 03:16:52', '2020-03-23 00:00:00', '2020-03-24 00:00:00', 'pinjam', 1),
(2, 'pesanan 2', 'jember', '01823123', 1, 1, '2020-03-20 13:13:02', '2020-03-25 00:00:00', '2020-03-26 00:00:00', 'aaa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipe_kamera`
--

CREATE TABLE `tbl_tipe_kamera` (
  `id_tipe_kamera` int(11) NOT NULL,
  `id_kamera` int(11) NOT NULL,
  `nama_tipe_kamera` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tipe_kamera`
--

INSERT INTO `tbl_tipe_kamera` (`id_tipe_kamera`, `id_kamera`, `nama_tipe_kamera`, `warna`, `update_time`) VALUES
(1, 1, 'canon1', '', '2020-03-20 09:26:10'),
(2, 1, 'canon 2', '', '2020-03-21 05:39:36'),
(3, 1, 'canon 3', '', '2020-03-21 05:39:42'),
(4, 2, 'nikon 1', '', '2020-03-21 05:39:48'),
(5, 2, 'nikon 2', '', '2020-03-21 05:39:56'),
(6, 3, 'sony 1', '', '2020-03-21 05:40:03'),
(7, 1, 'sony 2', '', '2020-03-21 05:40:08'),
(8, 1, 'sony 3', '#4e99b1', '2020-03-23 03:13:38'),
(9, 1, 'sony 4', '#ff80c0', '2020-03-23 03:10:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kamera`
--
ALTER TABLE `tbl_kamera`
  ADD PRIMARY KEY (`id_kamera`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tbl_tipe_kamera`
--
ALTER TABLE `tbl_tipe_kamera`
  ADD PRIMARY KEY (`id_tipe_kamera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kamera`
--
ALTER TABLE `tbl_kamera`
  MODIFY `id_kamera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tipe_kamera`
--
ALTER TABLE `tbl_tipe_kamera`
  MODIFY `id_tipe_kamera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
