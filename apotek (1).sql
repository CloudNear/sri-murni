-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 11:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL,
  `alamat_admin` varchar(50) NOT NULL,
  `telepon_admin` varchar(20) NOT NULL,
  `role_admin` int(11) NOT NULL,
  `status_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `password_admin`, `alamat_admin`, `telepon_admin`, `role_admin`, `status_admin`) VALUES
(338488828, 'Owner', 'root@gmail.com', 'WFJHdk1TeGlleGNtd2xPQU1ETnhvUT09', 'Purwakarta', '08765456412', 1, 1),
(1797264200, 'Taffania', 'taffania@gmail.com', 'UVkxU2owS0pzSjAwMWgwSEl0Z0RRZz09', 'PURWAKARTA', '087656765432', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `d_pembelian`
--

CREATE TABLE `d_pembelian` (
  `nota` varchar(50) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `hrg_beli` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_pembelian`
--

INSERT INTO `d_pembelian` (`nota`, `id_obat`, `hrg_beli`, `qty`, `subtotal`) VALUES
('NOTA-20220215064119', 1201907458, 12000, 40, 480000),
('NOTA-20220215064119', 2077889067, 8000, 29, 232000),
('NOTA-20220421100837', 2077889067, 130000, 1, 130000);

-- --------------------------------------------------------

--
-- Table structure for table `d_penjualan`
--

CREATE TABLE `d_penjualan` (
  `faktur` varchar(50) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_penjualan`
--

INSERT INTO `d_penjualan` (`faktur`, `id_obat`, `qty`, `subtotal`) VALUES
('FAKTUR-20220305080339', 1201907458, 10, 160000),
('FAKTUR-20220305080339', 2077889067, 19, 2660000),
('FAKTUR-20220305080519', 1201907458, 1, 16000),
('FAKTUR-20220305080706', 1201907458, 1, 16000),
('FAKTUR-20220305081856', 1201907458, 1, 16000),
('FAKTUR-20220421100328', 1201907458, 1, 16000),
('FAKTUR-20220421100354', 1201907458, 1, 16000),
('FAKTUR-20220421100824', 1201907458, 1, 16000);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `hrg_beli` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`, `hrg_beli`, `hrg_jual`) VALUES
(1201907458, 'AMOXILIN', 24, 13000, 16000),
(2077889067, 'PARACETAMOL 500mg', 21, 120000, 140000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `nota` varchar(50) NOT NULL,
  `tgl_beli` varchar(20) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`nota`, `tgl_beli`, `id_suplier`, `total_harga`, `id_admin`) VALUES
('NOTA-20220215064119', '2022-02-15', 1178722646, 712000, 338488828),
('NOTA-20220421100837', '2022-04-21', 1178722646, 130000, 338488828);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `faktur` varchar(50) NOT NULL,
  `tgl_jual` varchar(20) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `konsumen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`faktur`, `tgl_jual`, `total_harga`, `id_admin`, `konsumen`) VALUES
('FAKTUR-20220305080339', '2022-03-05', 2820000, 338488828, 'Egi'),
('FAKTUR-20220305080519', '2022-03-05', 16000, 338488828, 'rereggre'),
('FAKTUR-20220305080706', '2022-03-05', 16000, 338488828, 'kuyha'),
('FAKTUR-20220305081856', '2022-03-05', 16000, 338488828, 'scsc'),
('FAKTUR-20220421100328', '2022-04-21', 16000, 338488828, 'Egi'),
('FAKTUR-20220421100354', '2022-04-21', 16000, 338488828, 'wdwddw'),
('FAKTUR-20220421100824', '2022-04-21', 16000, 338488828, 'rereggre');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(50) NOT NULL,
  `alamat_suplier` varchar(50) NOT NULL,
  `telepon_suplier` varchar(20) NOT NULL,
  `status_suplier` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `alamat_suplier`, `telepon_suplier`, `status_suplier`) VALUES
(1178722646, 'Kimia Farma X-BIO', 'Jl. Ibrahim no 55 Jakarta', '087656787654', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `d_pembelian`
--
ALTER TABLE `d_pembelian`
  ADD KEY `nota` (`nota`,`id_obat`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `d_penjualan`
--
ALTER TABLE `d_penjualan`
  ADD KEY `faktur` (`faktur`,`id_obat`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`nota`),
  ADD KEY `id_suplier` (`id_suplier`,`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`faktur`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `d_pembelian`
--
ALTER TABLE `d_pembelian`
  ADD CONSTRAINT `d_pembelian_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `pembelian` (`nota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `d_pembelian_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `d_penjualan`
--
ALTER TABLE `d_penjualan`
  ADD CONSTRAINT `d_penjualan_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `d_penjualan_ibfk_2` FOREIGN KEY (`faktur`) REFERENCES `penjualan` (`faktur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
