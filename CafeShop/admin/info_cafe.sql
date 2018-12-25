-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2018 at 06:31 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admincafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `info_cafe`
--

CREATE TABLE `info_cafe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `bankid` varchar(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `hotline` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info_cafe`
--

INSERT INTO `info_cafe` (`id`, `name`, `vat`, `bankid`, `bank_name`, `address`, `hotline`) VALUES
(1, 'Caffe Chồn', '', '8978686', 'ViettinBank', '123 Phố Núi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info_cafe`
--
ALTER TABLE `info_cafe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info_cafe`
--
ALTER TABLE `info_cafe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
