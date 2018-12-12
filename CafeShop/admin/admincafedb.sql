-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 05:22 PM
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
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(5) NOT NULL,
  `bill_table` varchar(10) NOT NULL,
  `bill_employee` varchar(20) NOT NULL,
  `bill_drinks` varchar(500) NOT NULL,
  `bill_phuthu` mediumint(8) UNSIGNED NOT NULL,
  `bill_sale` tinyint(2) UNSIGNED NOT NULL,
  `bill_price` mediumint(8) UNSIGNED NOT NULL,
  `bill_moneytaked` mediumint(8) UNSIGNED NOT NULL,
  `bill_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `bill_table`, `bill_employee`, `bill_drinks`, `bill_phuthu`, `bill_sale`, `bill_price`, `bill_moneytaked`, `bill_time`) VALUES
(1, '1', 'admin2', 'Cafe Den, RedBull', 0, 20, 22000, 22000, '2018-12-02 15:53:20'),
(2, '2', 'admin2', 'Cafe Den', 0, 0, 10000, 10000, '2018-12-26 17:00:00'),
(3, '1', 'admin2', 'Number1', 0, 0, 11000, 11000, '2018-11-30 15:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `drink_id` varchar(9) NOT NULL,
  `type_id` int(3) NOT NULL,
  `drink_name` varchar(255) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`drink_id`, `type_id`, `drink_name`, `unit`, `price`, `quantity`) VALUES
('1', 1, 'Cafe Den', 'Ly', 10000, 2),
('cf2', 1, 'Bac xiu', 'ly', 12000, 9),
('ener1', 2, 'Red bull', 'lon', 12000, 50);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_username` varchar(15) NOT NULL,
  `employee_password` varchar(15) NOT NULL,
  `employee_realname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_username`, `employee_password`, `employee_realname`) VALUES
(1, 'admin2', 'admin2', 'Hoang nhu loz');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `src_id` varchar(9) NOT NULL,
  `type_id` int(3) NOT NULL,
  `src_name` varchar(255) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `buy_price` int(10) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`src_id`, `type_id`, `src_name`, `unit`, `buy_price`, `quantity`) VALUES
('1', 1, 'Hat Caffee', 'kg', 50000, 5),
('cfsrc1', 1, 'Cafe bot', 'kg', 50000, 4),
('src2', 1, 'asdas', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `thuchi`
--

CREATE TABLE `thuchi` (
  `thuchi_id` smallint(5) NOT NULL,
  `thuchi_type` tinyint(1) NOT NULL,
  `thuchi_price` int(10) NOT NULL,
  `thuchi_thanhtien` int(10) NOT NULL,
  `thuchi_note` varchar(500) NOT NULL,
  `thuchi_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `thuchi_customer` varchar(50) NOT NULL,
  `thuchi_address` varchar(255) NOT NULL,
  `thuchi_customernumber` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuchi`
--

INSERT INTO `thuchi` (`thuchi_id`, `thuchi_type`, `thuchi_price`, `thuchi_thanhtien`, `thuchi_note`, `thuchi_time`, `thuchi_customer`, `thuchi_address`, `thuchi_customernumber`) VALUES
(1, 0, 120000, 120000, 'Nhap 2 loc Redbull', '2018-12-02 14:44:52', 'Cua hang tap hoa XYZ', '6/9 Nam ki khoi nghia NHS DN', '090909969'),
(2, 1, 90000, 1800000, '200 lon Sữa ông thọ ', '2018-12-02 14:46:17', 'tạp hóa ABC', '10/8 CMT8', '1111111');

-- --------------------------------------------------------

--
-- Table structure for table `type_drink`
--

CREATE TABLE `type_drink` (
  `type_id` int(3) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_drink`
--

INSERT INTO `type_drink` (`type_id`, `type_name`) VALUES
(1, 'Cafe'),
(2, 'Energy Drink');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`drink_id`),
  ADD KEY `type_id` (`type_id`) USING BTREE,
  ADD KEY `type_id_2` (`type_id`) USING BTREE;

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`,`employee_username`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`src_id`,`src_name`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `thuchi`
--
ALTER TABLE `thuchi`
  ADD PRIMARY KEY (`thuchi_id`);

--
-- Indexes for table `type_drink`
--
ALTER TABLE `type_drink`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thuchi`
--
ALTER TABLE `thuchi`
  MODIFY `thuchi_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_drink`
--
ALTER TABLE `type_drink`
  MODIFY `type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drink`
--
ALTER TABLE `drink`
  ADD CONSTRAINT `drink_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_drink` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_drink` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
