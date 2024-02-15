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
-- Table structure for table `portresumefa_dppc_select`
--

CREATE TABLE `portresumefa_dppc_select` (
  `dppcs_id` int(11) NOT NULL,
  `dppcs_value` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `dppcs_parent` int(11) DEFAULT NULL,
  `dppcs_type` int(11) DEFAULT NULL,
  `dppcs_price` int(11) DEFAULT NULL,
  `dppcs_priority` int(11) DEFAULT NULL,
  `dppcs_icon` text COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `portresumefa_dppc_select`
--

INSERT INTO `portresumefa_dppc_select` (`dppcs_id`, `dppcs_value`, `dppcs_parent`, `dppcs_type`, `dppcs_price`, `dppcs_priority`, `dppcs_icon`) VALUES
(5, 'کابینت هوایی', 0, 2, 0, 3, 'pergola'),
(6, 'مدل گاز', 0, 3, 0, 7, 'oven_gen'),
(7, 'استاندارد', 5, 1, 0, 2, NULL),
(8, 'دوپله', 5, 1, 0, 10, NULL),
(9, 'ارتفاع 90', 5, 1, 0, 7, NULL),
(10, 'مبلی', 6, 1, 0, 5, NULL),
(11, 'صفحه ای', 6, 1, 0, 7, NULL),
(13, 'تجهیزات نظافتی', 0, 2, 0, 5, 'dishwasher_gen'),
(15, 'مدل یخچال', 0, 3, 0, 9, 'kitchen'),
(16, 'ماشین لباس شویی', 13, 1, 0, 2, ''),
(17, 'ماشین ظرفشویی', 13, 1, 0, 4, ''),
(18, 'ساید بای ساید', 15, 1, 0, 2, ''),
(19, 'دوقلو', 15, 1, 0, 5, ''),
(20, 'ساده', 15, 1, 0, 10, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portresumefa_dppc_select`
--
ALTER TABLE `portresumefa_dppc_select`
  ADD PRIMARY KEY (`dppcs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portresumefa_dppc_select`
--
ALTER TABLE `portresumefa_dppc_select`
  MODIFY `dppcs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
