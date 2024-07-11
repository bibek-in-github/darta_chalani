-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 11:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darta_chalani`
--

-- --------------------------------------------------------

--
-- Table structure for table `chalani`
--

CREATE TABLE `chalani` (
  `c_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `receiving_office` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `document` varchar(100) NOT NULL,
  `fiscalYear` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `darta`
--

CREATE TABLE `darta` (
  `d_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `sending_office` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `document` varchar(100) NOT NULL,
  `fiscalYear` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chalani`
--
ALTER TABLE `chalani`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `document` (`document`);

--
-- Indexes for table `darta`
--
ALTER TABLE `darta`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `document` (`document`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chalani`
--
ALTER TABLE `chalani`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `darta`
--
ALTER TABLE `darta`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
