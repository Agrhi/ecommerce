-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 12:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

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
  `nama` varchar(30) NOT NULL,
  `namastan` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `idjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jualan`
--

CREATE TABLE `jualan` (
  `idjualan` int(11) NOT NULL,
  `stok` varchar(10) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `jual` varchar(10) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `idceller` int(5) DEFAULT NULL,
  `role` int(1) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `pass`, `idceller`, `role`, `active`) VALUES
(1, 'Agrhi', 'admin', 'admin', 0, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `celler`
--
ALTER TABLE `celler`
  ADD PRIMARY KEY (`idceller`);

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
  MODIFY `idceller` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
