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
-- Table structure for table `portresumefa_dppc_settings`
--

CREATE TABLE `portresumefa_dppc_settings` (
  `dppcsettings_id` int(11) NOT NULL,
  `dppcsettings_value` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `portresumefa_dppc_settings`
--

INSERT INTO `portresumefa_dppc_settings` (`dppcsettings_id`, `dppcsettings_value`) VALUES
(1, 'هزینه نصب و اجرا'),
(2, '09121112244'),
(3, '#4f375e'),
(4, '#ffffff'),
(5, '#69a32c'),
(6, '#ffffff'),
(7, '#e7e7e7'),
(8, '#69a32c'),
(9, 'کارمزد نصب'),
(10, '02122233344'),
(11, '#4f375e'),
(12, '#ffffff'),
(13, '#ffffff'),
(14, '#69a32c'),
(15, '#69a32c'),
(16, '#ffffff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portresumefa_dppc_settings`
--
ALTER TABLE `portresumefa_dppc_settings`
  ADD PRIMARY KEY (`dppcsettings_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portresumefa_dppc_settings`
--
ALTER TABLE `portresumefa_dppc_settings`
  MODIFY `dppcsettings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
