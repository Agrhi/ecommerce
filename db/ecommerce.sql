-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 06:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `celler`
--

CREATE TABLE `celler` (
  `idceller` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `namastan` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `sku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `celler`
--

INSERT INTO `celler` (`idceller`, `nik`, `nama`, `namastan`, `alamat`, `nohp`, `sku`) VALUES
(1, '1', 'cek', 'cek', 'asd', '1', 'sku-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `jualan`
--

CREATE TABLE `jualan` (
  `idjualan` int(11) NOT NULL,
  `idceller` int(11) NOT NULL,
  `stok` varchar(10) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `jual` varchar(10) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jualan`
--

INSERT INTO `jualan` (`idjualan`, `idceller`, `stok`, `harga`, `jual`, `gambar`) VALUES
(1, 1, '1', '1', '', 'jualan-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `idpembeli` int(11) NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `nohp` varchar(13) DEFAULT NULL,
  `idceller` int(11) DEFAULT NULL,
  `idjualan` int(11) DEFAULT NULL,
  `ket` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `idceller` int(5) DEFAULT NULL,
  `role` int(1) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `pass`, `idceller`, `role`, `active`) VALUES
(1, 'Agrhi', 'admin', 'admin', NULL, 1, 1),
(2, 'cek', '123', '123', 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `celler`
--
ALTER TABLE `celler`
  ADD PRIMARY KEY (`idceller`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `jualan`
--
ALTER TABLE `jualan`
  ADD PRIMARY KEY (`idjualan`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`idpembeli`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `celler`
--
ALTER TABLE `celler`
  MODIFY `idceller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jualan`
--
ALTER TABLE `jualan`
  MODIFY `idjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `idpembeli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
