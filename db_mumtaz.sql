-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2018 at 10:29 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mumtaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `id_kategori`, `judul_buku`, `penerbit`, `pengarang`, `harga`, `jumlah`) VALUES
('AG1', 1, 'Fiqih', 'Erlangga', 'Abdul Somad', 30000, 46),
('KOM1', 2, 'Sistem Digital', 'Informatika', 'Rinaldi Munir', 50000, 42),
('AG2', 1, 'Akidah Akhlak', 'Erlangga', 'Jihad', 40000, 15),
('SC1', 3, 'Biologi', 'Mayora', 'Rahmad', 30000, 61);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_identitas` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(14) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `no_identitas`, `alamat`, `no_telepon`, `jenis_kelamin`, `jabatan`) VALUES
('1', 'dsfdsfdsf', '2132423435345', 'dvdsffd', '2312312', 'L', 'vdfvdfv'),
('2', 'Amek', '123123123', 'yudha karya', '132131', 'L', 'asdasda');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`kategori_id`, `nama_kategori`) VALUES
(1, 'Agama'),
(2, 'Komputer'),
(3, 'Sains'),
(4, 'Humor');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama`, `no_identitas`, `no_telepon`, `jenis_kelamin`, `alamat`) VALUES
('0', 'Umum', '123', '123', 'L', 'asdas'),
('1', 'Bagus', '1231231', '085355825959', 'L', 'Tembilahan'),
('3', 'Endang', '123231', '085355825959', 'P', 'medan');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `operator_id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login` date NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`operator_id`, `nama_lengkap`, `username`, `password`, `last_login`, `level`) VALUES
(7, 'Jihad', 'kelompok3', '21232f297a57a5a743894a0e4a801fc3', '2018-04-29', 'admin'),
(6, 'Admin', 'superadmin', '0192023a7bbd73250516f069df18b500', '2018-01-11', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `nama_pimpinan` varchar(50) NOT NULL,
  `nomor_telepon` varchar(14) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `nama_pimpinan`, `nomor_telepon`, `alamat`) VALUES
('1', 'Tambang', 'Jihadd', '085355825959', 'yudha karya'),
('3', 'Bebas', 'Jihad', '13123', 'yudha karya');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_log`
--

CREATE TABLE `tabel_log` (
  `log_id` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_user` varchar(255) DEFAULT NULL,
  `log_tipe` int(11) DEFAULT NULL,
  `log_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_log`
--

INSERT INTO `tabel_log` (`log_id`, `log_time`, `log_user`, `log_tipe`, `log_desc`) VALUES
(1, '2018-01-05 20:00:57', 'kelompok3', 2, 'Menambahkan data'),
(2, '2018-01-05 20:52:47', 'kelompok3', 7, 'Mencetak laporan'),
(3, '2018-01-05 20:57:48', 'kelompok3', 3, 'Mengedit data buku'),
(4, '2018-01-05 20:58:37', 'kelompok3', 7, 'Mencetak laporan'),
(5, '2018-01-05 20:59:17', 'kelompok3', 6, 'Mencetak laporan periode'),
(6, '2018-01-05 21:03:41', '0', 1, 'Logout Sistem'),
(7, '2018-01-05 21:03:55', 'admin', 0, 'Melakukan login '),
(8, '2018-01-05 21:05:24', 'admin', 1, 'Logout Sistem'),
(9, '2018-01-05 21:44:26', 'kelompok3', 0, 'Melakukan login '),
(10, '2018-01-05 21:51:54', 'kelompok3', 1, 'Logout Sistem'),
(11, '2018-01-05 21:54:19', 'kelompok3', 0, 'Melakukan login '),
(12, '2018-01-05 22:14:18', 'kelompok3', 1, 'Logout Sistem'),
(13, '2018-01-05 22:14:41', 'kelompok3', 0, 'Melakukan login '),
(14, '2018-01-05 22:14:45', 'kelompok3', 1, 'Logout Sistem'),
(15, '2018-01-05 22:16:08', 'kelompok3', 0, 'Melakukan login '),
(16, '2018-01-05 22:16:19', 'kelompok3', 1, 'Logout Sistem'),
(17, '2018-01-06 02:24:04', 'kelompok3', 0, 'Melakukan login '),
(18, '2018-01-09 10:16:46', 'kelompok3', 0, 'Melakukan login '),
(19, '2018-01-09 10:36:45', 'kelompok3', 1, 'Logout Sistem'),
(20, '2018-01-09 10:48:41', 'kelompok3', 0, 'Melakukan login '),
(21, '2018-01-09 10:49:04', 'kelompok3', 7, 'Mencetak laporan'),
(22, '2018-01-09 10:59:04', 'kelompok3', 1, 'Logout Sistem'),
(23, '2018-01-09 10:59:56', 'superadmin', 0, 'Melakukan login '),
(24, '2018-01-09 11:38:02', 'superadmin', 4, 'Menghapus data operator'),
(25, '2018-01-09 11:38:07', 'superadmin', 4, 'Menghapus data operator'),
(26, '2018-01-09 11:38:46', 'superadmin', 1, 'Logout Sistem'),
(27, '2018-01-09 11:39:00', 'kelompok3', 0, 'Melakukan login '),
(28, '2018-01-09 11:44:03', 'kelompok3', 1, 'Logout Sistem'),
(29, '2018-01-09 11:46:29', 'kelompok3', 0, 'Melakukan login '),
(30, '2018-01-09 11:47:43', 'kelompok3', 1, 'Logout Sistem'),
(31, '2018-01-09 11:51:12', 'kelompok3', 0, 'Melakukan login '),
(32, '2018-01-09 11:51:23', 'kelompok3', 1, 'Logout Sistem'),
(33, '2018-01-09 12:07:41', 'kelompok3', 0, 'Melakukan login '),
(34, '2018-01-09 12:20:34', 'kelompok3', 1, 'Logout Sistem'),
(35, '2018-01-09 12:21:15', 'superadmin', 0, 'Melakukan login '),
(36, '2018-01-09 12:22:43', 'superadmin', 1, 'Logout Sistem'),
(37, '2018-01-09 12:23:13', 'kelompok3', 0, 'Melakukan login '),
(38, '2018-01-09 12:44:56', 'kelompok3', 0, 'Melakukan login '),
(39, '2018-01-09 15:05:14', 'kelompok3', 0, 'Melakukan login '),
(40, '2018-01-09 15:14:36', 'kelompok3', 6, 'Mencetak laporan periode'),
(41, '2018-01-09 15:14:48', 'kelompok3', 6, 'Mencetak laporan periode'),
(42, '2018-01-09 15:15:38', 'kelompok3', 6, 'Mencetak laporan periode'),
(43, '2018-01-09 15:15:49', 'kelompok3', 6, 'Mencetak laporan periode'),
(44, '2018-01-09 15:16:04', 'kelompok3', 6, 'Mencetak laporan periode'),
(45, '2018-01-09 15:17:24', 'kelompok3', 3, 'Mengedit data buku'),
(46, '2018-01-09 15:19:16', 'kelompok3', 7, 'Mencetak laporan'),
(47, '2018-01-09 15:20:03', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(48, '2018-01-09 15:34:10', 'kelompok3', 2, 'Menambah data kategori'),
(49, '2018-01-09 15:43:23', 'kelompok3', 7, 'Mencetak laporan'),
(50, '2018-01-09 15:46:54', 'kelompok3', 3, 'Mengedit data buku'),
(51, '2018-01-09 15:48:28', 'kelompok3', 6, 'Mencetak laporan periode'),
(52, '2018-01-09 16:05:11', 'kelompok3', 6, 'Mencetak laporan periode'),
(53, '2018-01-09 16:05:16', 'kelompok3', 6, 'Mencetak laporan periode'),
(54, '2018-01-09 18:01:42', 'kelompok3', 1, 'Logout Sistem'),
(55, '2018-01-09 18:01:58', 'superadmin', 0, 'Melakukan login '),
(56, '2018-01-09 18:09:56', 'superadmin', 1, 'Logout Sistem'),
(57, '2018-01-09 18:10:09', 'kelompok3', 0, 'Melakukan login '),
(58, '2018-01-09 18:13:32', 'kelompok3', 1, 'Logout Sistem'),
(59, '2018-01-09 18:13:46', 'kelompok3', 0, 'Melakukan login '),
(60, '2018-01-09 18:19:27', 'Kelompok3', 0, 'Melakukan login '),
(61, '2018-01-09 18:20:55', 'Kelompok3', 1, 'Logout Sistem'),
(62, '2018-01-09 18:21:18', 'superadmin', 0, 'Melakukan login '),
(63, '2018-01-09 18:30:15', 'superadmin', 1, 'Logout Sistem'),
(64, '2018-01-09 18:30:29', 'kelompok3', 0, 'Melakukan login '),
(65, '2018-01-09 19:14:58', 'kelompok3', 2, 'Menambahkan data buku'),
(66, '2018-01-09 19:15:06', 'kelompok3', 4, 'Menghapus data buku'),
(67, '2018-01-09 19:15:20', 'kelompok3', 2, 'Menambahkan data buku'),
(68, '2018-01-09 19:15:49', 'kelompok3', 4, 'Menghapus data buku'),
(69, '2018-01-09 19:40:15', 'kelompok3', 3, 'Mengedit data buku'),
(70, '2018-01-09 19:43:20', 'kelompok3', 3, 'Mengedit data buku'),
(71, '2018-01-09 20:00:13', 'kelompok3', 3, 'Mengedit data karyawan'),
(72, '2018-01-09 20:07:54', 'kelompok3', 3, 'Mengedit data kategori'),
(73, '2018-01-09 20:16:40', 'kelompok3', 1, 'Logout Sistem'),
(74, '2018-01-09 20:17:00', 'superadmin', 0, 'Melakukan login '),
(75, '2018-01-09 20:22:35', 'superadmin', 1, 'Logout Sistem'),
(76, '2018-01-09 20:23:54', 'kelompok3', 0, 'Melakukan login '),
(77, '2018-01-09 20:47:28', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(78, '2018-01-09 22:22:28', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(79, '2018-01-09 22:27:27', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(80, '2018-01-09 22:29:57', 'kelompok3', 3, 'Mengedit data buku'),
(81, '2018-01-09 22:30:20', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(82, '2018-01-09 22:31:45', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(83, '2018-01-09 22:33:22', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(84, '2018-01-10 00:15:45', 'kelompok3', 0, 'Melakukan login '),
(85, '2018-01-10 00:42:33', 'kelompok3', 1, 'Logout Sistem'),
(86, '2018-01-10 00:42:49', 'kelompok3', 0, 'Melakukan login '),
(87, '2018-01-10 00:45:42', 'kelompok3', 1, 'Logout Sistem'),
(88, '2018-01-10 00:46:03', 'kelompok3', 0, 'Melakukan login '),
(89, '2018-01-10 00:47:50', 'kelompok3', 0, 'Melakukan login '),
(90, '2018-01-10 00:52:39', 'kelompok3', 0, 'Melakukan login '),
(91, '2018-01-10 00:53:38', 'kelompok3', 1, 'Logout Sistem'),
(92, '2018-01-10 00:53:52', 'kelompok3', 0, 'Melakukan login '),
(93, '2018-01-10 01:16:12', 'kelompok3', 1, 'Logout Sistem'),
(94, '2018-01-10 01:16:38', 'kelompok3', 0, 'Melakukan login '),
(95, '2018-01-10 01:18:32', 'kelompok3', 1, 'Logout Sistem'),
(96, '2018-01-10 01:18:43', 'kelompok3', 0, 'Melakukan login '),
(97, '2018-01-10 01:38:33', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(98, '2018-01-10 01:39:11', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(99, '2018-01-10 01:40:09', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(100, '2018-01-10 01:51:26', 'kelompok3', 6, 'Mencetak laporan periode'),
(101, '2018-01-10 02:03:30', 'kelompok3', 0, 'Melakukan login '),
(102, '2018-01-10 03:10:48', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(103, '2018-01-10 03:18:58', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(104, '2018-01-10 03:19:29', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(105, '2018-01-10 03:19:31', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(106, '2018-01-10 07:46:26', 'kelompok3', 0, 'Melakukan login '),
(107, '2018-01-10 07:48:34', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(108, '2018-01-10 08:01:28', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(109, '2018-01-10 08:01:53', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(110, '2018-01-10 08:20:05', 'kelompok3', 0, 'Melakukan login '),
(111, '2018-01-10 08:39:40', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(112, '2018-01-10 08:42:29', 'kelompok3', 1, 'Logout Sistem'),
(113, '2018-01-10 08:43:05', 'kelompok3', 0, 'Melakukan login '),
(114, '2018-01-10 08:43:15', 'kelompok3', 1, 'Logout Sistem'),
(115, '2018-01-10 08:43:21', 'superadmin', 0, 'Melakukan login '),
(116, '2018-01-10 08:44:05', 'superadmin', 1, 'Logout Sistem'),
(117, '2018-01-10 08:44:10', 'kelompok3', 0, 'Melakukan login '),
(118, '2018-01-10 08:46:02', 'kelompok3', 7, 'Mencetak laporan'),
(119, '2018-01-10 09:08:47', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(120, '2018-01-10 09:17:35', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(121, '2018-01-10 14:00:34', 'kelompok3', 0, 'Melakukan login '),
(122, '2018-01-10 14:00:40', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(123, '2018-01-10 14:06:03', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(124, '2018-01-10 14:14:37', 'kelompok3', 6, 'Mencetak laporan periode'),
(125, '2018-01-10 14:24:48', 'kelompok3', 6, 'Mencetak laporan periode'),
(126, '2018-01-10 14:25:35', 'kelompok3', 6, 'Mencetak laporan periode'),
(127, '2018-01-10 14:25:53', 'kelompok3', 6, 'Mencetak laporan periode'),
(128, '2018-01-10 14:26:12', 'kelompok3', 6, 'Mencetak laporan periode'),
(129, '2018-01-10 14:33:52', 'kelompok3', 0, 'Melakukan login '),
(130, '2018-01-10 15:04:03', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(131, '2018-01-10 15:31:18', 'kelompok3', 6, 'Mencetak laporan periode'),
(132, '2018-01-10 15:31:55', 'kelompok3', 6, 'Mencetak laporan periode'),
(133, '2018-01-10 15:32:14', 'kelompok3', 6, 'Mencetak laporan periode'),
(134, '2018-01-10 15:32:25', 'kelompok3', 6, 'Mencetak laporan periode'),
(135, '2018-01-10 15:33:13', 'kelompok3', 6, 'Mencetak laporan periode'),
(136, '2018-01-10 15:33:33', 'kelompok3', 6, 'Mencetak laporan periode'),
(137, '2018-01-10 15:33:42', 'kelompok3', 6, 'Mencetak laporan periode'),
(138, '2018-01-10 15:34:32', 'kelompok3', 6, 'Mencetak laporan periode'),
(139, '2018-01-10 15:35:07', 'kelompok3', 6, 'Mencetak laporan periode'),
(140, '2018-01-10 15:35:24', 'kelompok3', 6, 'Mencetak laporan periode'),
(141, '2018-01-10 15:35:33', 'kelompok3', 6, 'Mencetak laporan periode'),
(142, '2018-01-10 15:35:44', 'kelompok3', 6, 'Mencetak laporan periode'),
(143, '2018-01-10 15:36:43', 'kelompok3', 6, 'Mencetak laporan periode'),
(144, '2018-01-10 15:40:22', 'kelompok3', 6, 'Mencetak laporan periode'),
(145, '2018-01-10 15:40:48', 'kelompok3', 6, 'Mencetak laporan periode'),
(146, '2018-01-10 15:41:02', 'kelompok3', 6, 'Mencetak laporan periode'),
(147, '2018-01-10 15:41:12', 'kelompok3', 6, 'Mencetak laporan periode'),
(148, '2018-01-10 15:42:35', 'kelompok3', 6, 'Mencetak laporan periode'),
(149, '2018-01-10 15:42:44', 'kelompok3', 6, 'Mencetak laporan periode'),
(150, '2018-01-10 15:42:49', 'kelompok3', 6, 'Mencetak laporan periode'),
(151, '2018-01-10 15:43:51', 'kelompok3', 6, 'Mencetak laporan periode'),
(152, '2018-01-10 15:44:01', 'kelompok3', 6, 'Mencetak laporan periode'),
(153, '2018-01-10 15:44:36', 'kelompok3', 6, 'Mencetak laporan periode'),
(154, '2018-01-10 15:44:50', 'kelompok3', 6, 'Mencetak laporan periode'),
(155, '2018-01-10 15:44:58', 'kelompok3', 6, 'Mencetak laporan periode'),
(156, '2018-01-10 15:46:04', 'kelompok3', 6, 'Mencetak laporan periode'),
(157, '2018-01-10 15:46:51', 'kelompok3', 6, 'Mencetak laporan periode'),
(158, '2018-01-10 15:48:39', 'kelompok3', 6, 'Mencetak laporan periode'),
(159, '2018-01-10 15:49:01', 'kelompok3', 6, 'Mencetak laporan periode'),
(160, '2018-01-10 15:49:22', 'kelompok3', 6, 'Mencetak laporan periode'),
(161, '2018-01-10 15:49:40', 'kelompok3', 6, 'Mencetak laporan periode'),
(162, '2018-01-10 15:50:05', 'kelompok3', 6, 'Mencetak laporan periode'),
(163, '2018-01-10 15:50:23', 'kelompok3', 6, 'Mencetak laporan periode'),
(164, '2018-01-10 15:50:32', 'kelompok3', 6, 'Mencetak laporan periode'),
(165, '2018-01-10 15:51:08', 'kelompok3', 6, 'Mencetak laporan periode'),
(166, '2018-01-10 15:51:23', 'kelompok3', 6, 'Mencetak laporan periode'),
(167, '2018-01-10 15:51:46', 'kelompok3', 6, 'Mencetak laporan periode'),
(168, '2018-01-10 15:52:20', 'kelompok3', 6, 'Mencetak laporan periode'),
(169, '2018-01-10 15:52:40', 'kelompok3', 6, 'Mencetak laporan periode'),
(170, '2018-01-10 15:52:47', 'kelompok3', 6, 'Mencetak laporan periode'),
(171, '2018-01-10 15:53:50', 'kelompok3', 6, 'Mencetak laporan periode'),
(172, '2018-01-10 16:09:39', 'kelompok3', 1, 'Logout Sistem'),
(173, '2018-01-10 16:09:45', 'superadmin', 0, 'Melakukan login '),
(174, '2018-01-10 16:21:10', 'superadmin', 1, 'Logout Sistem'),
(175, '2018-01-10 16:21:18', 'kelompok3', 0, 'Melakukan login '),
(176, '2018-01-10 17:19:59', 'kelompok3', 6, 'Mencetak laporan periode'),
(177, '2018-01-10 17:20:53', 'kelompok3', 6, 'Mencetak laporan periode'),
(178, '2018-01-10 17:48:15', 'kelompok3', 3, 'Mengedit data kategori'),
(179, '2018-01-10 18:10:48', 'kelompok3', 1, 'Logout Sistem'),
(180, '2018-01-10 18:10:56', 'kelompok3', 0, 'Melakukan login '),
(181, '2018-01-10 18:11:09', 'kelompok3', 1, 'Logout Sistem'),
(182, '2018-01-10 18:11:16', 'superadmin', 0, 'Melakukan login '),
(183, '2018-01-10 18:12:12', 'superadmin', 1, 'Logout Sistem'),
(184, '2018-01-10 18:14:53', 'kelompok3', 0, 'Melakukan login '),
(185, '2018-01-10 18:19:18', 'kelompok3', 1, 'Logout Sistem'),
(186, '2018-01-10 18:51:21', 'kelompok3', 0, 'Melakukan login '),
(187, '2018-01-10 18:51:45', 'kelompok3', 1, 'Logout Sistem'),
(188, '2018-01-10 18:51:55', 'kelompok3', 0, 'Melakukan login '),
(189, '2018-01-10 19:05:31', 'kelompok3', 1, 'Logout Sistem'),
(190, '2018-01-10 19:14:19', 'kelompok3', 0, 'Melakukan login '),
(191, '2018-01-10 19:33:32', 'kelompok3', 6, 'Mencetak laporan periode'),
(192, '2018-01-10 19:33:50', 'kelompok3', 6, 'Mencetak laporan periode'),
(193, '2018-01-10 19:35:45', 'kelompok3', 1, 'Logout Sistem'),
(194, '2018-01-10 19:35:52', 'superadmin', 0, 'Melakukan login '),
(195, '2018-01-10 19:36:49', 'superadmin', 1, 'Logout Sistem'),
(196, '2018-01-10 19:42:45', 'kelompok3', 0, 'Melakukan login '),
(197, '2018-01-10 19:58:12', 'kelompok3', 6, 'Mencetak laporan periode'),
(198, '2018-01-10 20:01:10', 'kelompok3', 6, 'Mencetak laporan periode'),
(199, '2018-01-10 20:01:49', 'kelompok3', 6, 'Mencetak laporan periode'),
(200, '2018-01-10 20:02:36', 'kelompok3', 6, 'Mencetak laporan periode'),
(201, '2018-01-10 20:06:42', 'kelompok3', 6, 'Mencetak laporan periode'),
(202, '2018-01-10 20:07:54', 'kelompok3', 6, 'Mencetak laporan periode'),
(203, '2018-01-10 20:40:01', 'kelompok3', 1, 'Logout Sistem'),
(204, '2018-01-10 20:44:56', 'kelompok3', 0, 'Melakukan login '),
(205, '2018-01-10 20:45:00', 'kelompok3', 1, 'Logout Sistem'),
(206, '2018-01-10 21:03:21', 'kelompok3', 0, 'Melakukan login '),
(207, '2018-01-10 21:24:19', 'kelompok3', 0, 'Melakukan login '),
(208, '2018-01-10 21:50:59', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(209, '2018-01-10 21:53:06', 'kelompok3', 3, 'Mengedit data buku'),
(210, '2018-01-10 21:56:14', 'kelompok3', 6, 'Mencetak laporan periode'),
(211, '2018-01-10 22:14:21', 'kelompok3', 0, 'Melakukan login '),
(212, '2018-01-10 22:36:10', 'kelompok3', 0, 'Melakukan login '),
(213, '2018-01-10 23:11:53', 'kelompok3', 1, 'Logout Sistem'),
(214, '2018-01-10 23:12:09', 'superadmin', 0, 'Melakukan login '),
(215, '2018-01-10 23:25:26', 'superadmin', 1, 'Logout Sistem'),
(216, '2018-01-10 23:31:58', 'kelompok3', 0, 'Melakukan login '),
(217, '2018-01-11 00:21:35', 'kelompok3', 1, 'Logout Sistem'),
(218, '2018-01-11 00:25:58', 'kelompok3', 0, 'Melakukan login '),
(219, '2018-01-11 00:29:34', 'kelompok3', 1, 'Logout Sistem'),
(220, '2018-01-11 00:29:41', 'superadmin', 0, 'Melakukan login '),
(221, '2018-01-11 00:35:04', 'superadmin', 1, 'Logout Sistem'),
(222, '2018-01-11 00:35:10', 'kelompok3', 0, 'Melakukan login '),
(223, '2018-01-11 01:22:35', 'kelompok3', 1, 'Logout Sistem'),
(224, '2018-01-11 01:24:04', 'kelompok3', 0, 'Melakukan login '),
(225, '2018-01-11 01:24:57', 'kelompok3', 1, 'Logout Sistem'),
(226, '2018-01-11 01:35:08', 'kelompok3', 0, 'Melakukan login '),
(227, '2018-01-11 01:38:23', 'kelompok3', 2, 'Menambah data supplier'),
(228, '2018-01-11 01:38:57', 'kelompok3', 3, 'Mengedit data supplier'),
(229, '2018-01-11 02:17:42', 'kelompok3', 2, 'Menambahkan data buku'),
(230, '2018-01-11 19:53:33', 'kelompok3', 0, 'Melakukan login '),
(231, '2018-01-11 20:16:24', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(232, '2018-01-11 20:25:02', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(233, '2018-01-11 20:25:49', 'kelompok3', 3, 'Mengedit data buku'),
(234, '2018-01-11 20:26:15', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(235, '2018-01-11 20:42:07', 'kelompok3', 0, 'Melakukan login '),
(236, '2018-01-11 20:59:47', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(237, '2018-01-11 21:10:59', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(238, '2018-01-11 21:29:53', 'kelompok3', 3, 'Mengedit data buku'),
(239, '2018-01-11 21:30:36', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(240, '2018-01-11 21:38:56', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(241, '2018-01-11 21:50:05', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(242, '2018-01-11 21:56:54', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(243, '2018-01-11 22:04:32', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(244, '2018-01-11 22:05:16', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(245, '2018-01-11 22:05:34', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(246, '2018-01-11 23:12:06', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(247, '2018-01-12 01:51:38', 'kelompok3', 0, 'Melakukan login '),
(248, '2018-01-12 02:13:24', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(249, '2018-04-27 10:10:20', 'kelompok3', 0, 'Melakukan login '),
(250, '2018-04-27 10:11:44', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(251, '2018-04-27 10:18:25', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(252, '2018-04-27 13:43:53', 'kelompok3', 0, 'Melakukan login '),
(253, '2018-04-27 13:45:53', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(254, '2018-04-27 13:47:00', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(255, '2018-04-27 14:23:26', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(256, '2018-04-29 13:01:42', 'kelompok3', 0, 'Melakukan login '),
(257, '2018-04-29 13:16:48', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(258, '2018-04-29 13:17:10', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(259, '2018-04-29 13:19:05', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(260, '2018-04-29 13:19:52', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(261, '2018-04-29 13:21:28', 'kelompok3', 5, 'Transaksi Penjualan Buku'),
(262, '2018-04-29 13:33:34', 'kelompok3', NULL, 'Transaksi Pemasukan Buku'),
(263, '2018-04-29 13:44:53', 'kelompok3', 6, 'Mencetak laporan periode'),
(264, '2018-04-29 13:46:01', 'kelompok3', 6, 'Mencetak laporan periode'),
(265, '2018-04-29 13:46:11', 'kelompok3', 6, 'Mencetak laporan periode'),
(266, '2018-04-29 13:46:23', 'kelompok3', 6, 'Mencetak laporan periode'),
(267, '2018-04-29 13:46:29', 'kelompok3', 6, 'Mencetak laporan periode'),
(268, '2018-04-29 13:47:22', 'kelompok3', 4, 'Menghapus data buku');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `operator_id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `grandtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `tanggal`, `operator_id`, `id_member`, `total`, `diskon`, `grandtotal`) VALUES
(1, '2018-01-11', 7, 0, 0, 0, 0),
(2, '2018-01-11', 7, 0, 0, 0, 0),
(3, '2018-01-11', 7, 0, 0, 0, 0),
(4, '2018-01-11', 7, 0, 0, 0, 0),
(5, '2018-01-11', 7, 0, 0, 0, 0),
(6, '2018-01-11', 7, 0, 0, 0, 0),
(7, '2018-01-11', 7, 0, 0, 0, 0),
(8, '2018-01-11', 7, 0, 140000, 0, 0),
(9, '2018-01-11', 7, 3, 140000, 0, 0),
(10, '2018-01-11', 7, 0, 140000, 1, 139999),
(11, '2018-01-11', 7, 0, 140000, 0, 140000),
(12, '2018-01-11', 7, 1, 140000, 14000, 126000),
(13, '2018-01-12', 7, 3, 140000, 14000, 126000),
(14, '2018-01-12', 7, 1, 160000, 16000, 144000),
(15, '2018-04-27', 7, 3, 60000, 6000, 54000),
(16, '2018-04-27', 7, 1, 80000, 8000, 72000),
(17, '2018-04-27', 7, 0, 234234, 0, 234234),
(18, '2018-04-27', 7, 1, 50000, 5000, 45000),
(19, '2018-04-27', 7, 3, 150000, 15000, 135000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_beli`
--

CREATE TABLE `transaksi_beli` (
  `transaksi_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_beli`
--

INSERT INTO `transaksi_beli` (`transaksi_id`, `tanggal`, `id_supplier`, `total`) VALUES
(1, '2018-04-29', 0, 0),
(2, '2018-04-29', 0, 0),
(3, '2018-04-29', 0, 20000),
(4, '2018-04-29', 0, 20000),
(5, '2018-04-29', 0, 30000),
(6, '2018-04-29', 0, 30000),
(7, '2018-04-29', 0, 84000),
(8, '2018-04-29', 3, 33000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_beli_detail`
--

CREATE TABLE `transaksi_beli_detail` (
  `id_transaksi_beli` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('0','1') NOT NULL,
  `transaksi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_beli_detail`
--

INSERT INTO `transaksi_beli_detail` (`id_transaksi_beli`, `judul_buku`, `harga_beli`, `jumlah`, `total`, `tanggal`, `status`, `transaksi_id`) VALUES
(1, 'a', 40000, 2, 80000, '2018-01-10', '1', 0),
(2, 'a', 50000, 5, 250000, '2018-01-10', '1', 0),
(3, 'asdad', 30000, 8, 240000, '2018-01-10', '1', 0),
(5, 'DIA', 40000, 20, 800000, '2018-01-11', '1', 2),
(6, 'Sejarah Peradaban Islam', 50000, 30, 1500000, '2018-04-27', '1', 2),
(7, 'Buku', 10000, 2, 20000, '2018-04-29', '1', 3),
(8, 'Buku2', 10000, 3, 30000, '2018-04-29', '1', 5),
(9, 'Buku3', 21000, 4, 84000, '2018-04-29', '1', 7),
(10, '322', 11000, 3, 33000, '2018-04-29', '1', 8);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `t_detail_id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '1= sudah diproses , 0 belum diproses',
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`t_detail_id`, `transaksi_id`, `kode_buku`, `qty`, `harga`, `status`, `tanggal`, `total`) VALUES
(1, 5, 'AG2', 2, 40000, '1', '2018-01-11', 80000),
(2, 5, 'AG1', 2, 30000, '1', '2018-01-11', 60000),
(3, 6, 'AG2', 2, 40000, '1', '2018-01-11', 80000),
(4, 6, 'KOM1', 3, 50000, '1', '2018-01-11', 150000),
(5, 7, 'KOM1', 1, 50000, '1', '2018-01-11', 50000),
(6, 7, 'SC1', 2, 30000, '1', '2018-01-11', 60000),
(7, 8, 'AG2', 2, 40000, '1', '2018-01-11', 80000),
(8, 8, 'AG1', 2, 30000, '1', '2018-01-11', 60000),
(9, 9, 'AG2', 2, 40000, '1', '2018-01-11', 80000),
(10, 9, 'AG1', 2, 30000, '1', '2018-01-11', 60000),
(11, 10, 'AG1', 2, 30000, '1', '2018-01-11', 60000),
(12, 10, 'AG2', 2, 40000, '1', '2018-01-11', 80000),
(13, 11, 'AG1', 2, 30000, '1', '2018-01-11', 60000),
(14, 11, 'AG2', 2, 40000, '1', '2018-01-11', 80000),
(15, 12, 'AG2', 2, 40000, '1', '2018-01-11', 80000),
(16, 12, 'AG1', 2, 30000, '1', '2018-01-11', 60000),
(17, 13, 'AG1', 2, 30000, '1', '2018-01-11', 60000),
(18, 13, 'AG2', 2, 40000, '1', '2018-01-11', 80000),
(19, 14, 'AG1', 2, 30000, '1', '2018-01-12', 60000),
(20, 14, 'AG2', 1, 40000, '1', '2018-01-12', 40000),
(21, 14, 'AG1', 2, 30000, '1', '2018-01-12', 60000),
(22, 15, 'AG1', 2, 30000, '1', '2018-01-12', 60000),
(23, 16, 'AG2', 2, 40000, '1', '2018-04-27', 80000),
(24, 17, 'sfdf', 1, 234234, '1', '2018-04-27', 234234),
(25, 18, 'KOM1', 1, 50000, '1', '2018-04-27', 50000),
(26, 19, 'AG2', 3, 40000, '1', '2018-04-27', 120000),
(27, 19, 'AG1', 1, 30000, '1', '2018-04-27', 30000);

--
-- Triggers `transaksi_detail`
--
DELIMITER $$
CREATE TRIGGER `kurang` AFTER INSERT ON `transaksi_detail` FOR EACH ROW begin
	update buku set jumlah = jumlah - new.qty where kode_buku=new.kode_buku;
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`operator_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tabel_log`
--
ALTER TABLE `tabel_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `transaksi_beli`
--
ALTER TABLE `transaksi_beli`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `transaksi_beli_detail`
--
ALTER TABLE `transaksi_beli_detail`
  ADD PRIMARY KEY (`id_transaksi_beli`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`t_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `operator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_log`
--
ALTER TABLE `tabel_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi_beli`
--
ALTER TABLE `transaksi_beli`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi_beli_detail`
--
ALTER TABLE `transaksi_beli_detail`
  MODIFY `id_transaksi_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `t_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
