-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2024 at 02:28 AM
-- Server version: 5.7.44-cll-lve
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amirolph_atwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `portresumefa_dppc_scale`
--

CREATE TABLE `portresumefa_dppc_scale` (
  `dppcs_id` int(11) NOT NULL,
  `dppcs_value` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `dppcs_x` int(11) DEFAULT NULL,
  `dppcs_y` int(11) DEFAULT NULL,
  `dppcs_priority` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `portresumefa_dppc_scale`
--

INSERT INTO `portresumefa_dppc_scale` (`dppcs_id`, `dppcs_value`, `dppcs_x`, `dppcs_y`, `dppcs_priority`) VALUES
(6, 'کابینت زمینی', 1, NULL, 6),
(5, 'کابینت هوایی', 1, NULL, 4),
(7, 'کابینت ایستاده', NULL, NULL, 9),
(8, 'جزیره', NULL, 1, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portresumefa_dppc_scale`
--
ALTER TABLE `portresumefa_dppc_scale`
  ADD PRIMARY KEY (`dppcs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portresumefa_dppc_scale`
--
ALTER TABLE `portresumefa_dppc_scale`
  MODIFY `dppcs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
