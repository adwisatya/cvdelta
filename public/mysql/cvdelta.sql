-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2015 at 08:06 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cvdelta`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

CREATE TABLE IF NOT EXISTS `administrasi` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang_rusak`
--

CREATE TABLE IF NOT EXISTS `barang_rusak` (
  `nama_barang_rusak` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_seri_barang_rusak` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_surat_jalan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_datang` date NOT NULL,
  `harga_jasa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_diperbaiki` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_selesai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barang_rusak`
--

INSERT INTO `barang_rusak` (`nama_barang_rusak`, `nama_perusahaan`, `no_seri_barang_rusak`, `no_surat_jalan`, `tgl_datang`, `harga_jasa`, `status`, `tgl_diperbaiki`, `tgl_selesai`, `username`) VALUES
('Mo1nitor1', 'LG', 'LG5143e1', '001112AP151', '2015-04-16', '60100001', '9', '2015-04-17', '2015-04-27', 'aryya'),
('Monitor', 'LG', 'LG543e', '00112AP15', '2015-04-16', '600000', '1', '2015-04-17', '2015-04-27', 'aryya'),
('Monitor1', 'LG', 'LG543e1', '00112AP151', '2015-04-16', '6000001', '0', '2015-04-17', '2015-04-27', 'aryya');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `nama_perusahaan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`nama_perusahaan`, `alamat`, `telepon`, `contact_person`) VALUES
('LG', 'Jalan LG 1', '8473621', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE IF NOT EXISTS `komponen` (
  `supplier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_komponen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_seri_komponen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` int(10) unsigned NOT NULL,
  `lokasi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `min_jumlah` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`supplier`, `nama_komponen`, `no_seri_komponen`, `harga`, `jumlah`, `lokasi`, `keterangan`, `min_jumlah`) VALUES
('ASUS', 'RAM', 'ASUSRAM2', '700000', 23, 'Bandung', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_04_13_092233_user', 1),
('2015_04_13_155311_nullablekey', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE IF NOT EXISTS `tagihan` (
  `no_seri_komponen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_seri_barang_rusak` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `no_tagihan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE IF NOT EXISTS `teknisi` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`username`, `password`, `role`) VALUES
('aryya', 'aryya', '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
 ADD PRIMARY KEY (`no_seri_barang_rusak`), ADD KEY `barang_rusak_username_foreign` (`username`), ADD KEY `barang_rusak_nama_perusahaan_foreign` (`nama_perusahaan`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`nama_perusahaan`);

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
 ADD PRIMARY KEY (`no_seri_komponen`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
 ADD KEY `tagihan_no_seri_komponen_foreign` (`no_seri_komponen`), ADD KEY `tagihan_no_seri_barang_rusak_foreign` (`no_seri_barang_rusak`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
 ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
ADD CONSTRAINT `barang_rusak_nama_perusahaan_foreign` FOREIGN KEY (`nama_perusahaan`) REFERENCES `customer` (`nama_perusahaan`) ON DELETE CASCADE,
ADD CONSTRAINT `barang_rusak_username_foreign` FOREIGN KEY (`username`) REFERENCES `teknisi` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
ADD CONSTRAINT `tagihan_no_seri_barang_rusak_foreign` FOREIGN KEY (`no_seri_barang_rusak`) REFERENCES `barang_rusak` (`no_seri_barang_rusak`) ON DELETE CASCADE,
ADD CONSTRAINT `tagihan_no_seri_komponen_foreign` FOREIGN KEY (`no_seri_komponen`) REFERENCES `komponen` (`no_seri_komponen`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
