-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 12:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlkh`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadonbh`
--

CREATE TABLE `hoadonbh` (
  `MaHD` varchar(10) NOT NULL,
  `NgayLap` date NOT NULL,
  `MaKH` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoadonbh`
--

INSERT INTO `hoadonbh` (`MaHD`, `NgayLap`, `MaKH`) VALUES
('HD001', '2020-09-09', '001'),
('HD002', '2020-10-02', '002');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` varchar(10) NOT NULL,
  `TenKH` varchar(20) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SoDT` varchar(11) NOT NULL,
  `GTinh` tinyint(4) NOT NULL,
  `MaLoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `DiaChi`, `SoDT`, `GTinh`, `MaLoai`) VALUES
('001', 'Lại Quốc Đạt', 'Khánh Hòa', '0999999913', 0, 'TT1'),
('002', 'Hoàng Văn Mã', 'Trung Quốc', '0327328232', 0, 'QB2');

-- --------------------------------------------------------

--
-- Table structure for table `loaikh`
--

CREATE TABLE `loaikh` (
  `MaLoai` varchar(5) NOT NULL,
  `TenLoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaikh`
--

INSERT INTO `loaikh` (`MaLoai`, `TenLoai`) VALUES
('QB2', 'Quen Biết 2'),
('TT1', 'Thân Thuộc 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadonbh`
--
ALTER TABLE `hoadonbh`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaKH` (`MaKH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `MaLoai` (`MaLoai`);

--
-- Indexes for table `loaikh`
--
ALTER TABLE `loaikh`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadonbh`
--
ALTER TABLE `hoadonbh`
  ADD CONSTRAINT `hoadonbh_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaikh` (`MaLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
