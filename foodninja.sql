-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 06:13 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodninja`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `PKFoodId` int(11) NOT NULL,
  `FKuserId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Price` float(13,2) NOT NULL,
  `Addon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`PKFoodId`, `FKuserId`, `Name`, `Image`, `Description`, `Price`, `Addon`, `Status`) VALUES
(1, 1, 'Roti', '', 'Test', 0.00, '2019-12-14 21:11:49', 1),
(2, 1, 'Sagar Rajput', '20191214222232Screenshot (1).png', 'tesst', 0.00, '2019-12-14 21:22:32', 1),
(3, 1, 'daal makhni', '20191215065513480533.png', 'test description', 200.00, '2019-12-15 05:55:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `PKOrderId` int(11) NOT NULL,
  `FKFoodId` int(11) NOT NULL,
  `FKUserId` int(11) NOT NULL,
  `Price` float(14,2) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Addon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`PKOrderId`, `FKFoodId`, `FKUserId`, `Price`, `Name`, `Email`, `Mobile`, `Address`, `Addon`, `Status`) VALUES
(1, 3, 4, 0.00, 'Kamal', 'kamal@customer.com', '9839098390', 'test', '2019-12-15 16:43:51', 1),
(2, 3, 4, 0.00, 'Kamal', 'kamal@customer.com', '9839098390', 'test', '2019-12-15 16:45:19', 1),
(3, 2, 4, 0.00, 'Kamal', 'kamal@customer.com', '9839098390', 'kakadeo', '2019-12-15 17:07:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `PKUserId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Type` varchar(2) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Addon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`PKUserId`, `Name`, `Email`, `Mobile`, `Type`, `Password`, `Addon`, `Status`) VALUES
(1, 'Sagar Rajput', 'srajput@gmail.com', '8650011462', 'R', '41ed44e3038dbeee7d2ffaa7f51d8a4b', '2019-12-14 20:20:59', 1),
(2, 'Sagar Rajput', 'srajput@gmail.com', '8650011462', 'R', '41ed44e3038dbeee7d2ffaa7f51d8a4b', '2019-12-14 20:20:54', 1),
(3, 'Sagar Rajput', 'srajput1@gmail.com', '8650011462', 'R', '41ed44e3038dbeee7d2ffaa7f51d8a4b', '2019-12-14 20:11:48', 1),
(4, 'Kamal', 'kamal@customer.com', '9839098390', 'C', 'aa63b0d5d950361c05012235ab520512', '2019-12-14 20:26:04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`PKFoodId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`PKOrderId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`PKUserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `PKFoodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `PKOrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `PKUserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
