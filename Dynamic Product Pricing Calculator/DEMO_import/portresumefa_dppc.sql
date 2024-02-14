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
-- Table structure for table `portresumefa_dppc`
--

CREATE TABLE `portresumefa_dppc` (
  `dppc_id` int(11) NOT NULL,
  `dppc_value` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `dppc_parent` int(11) DEFAULT NULL,
  `dppc_price` text COLLATE utf8mb4_unicode_520_ci,
  `dppc_additional_price` text COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `portresumefa_dppc`
--

INSERT INTO `portresumefa_dppc` (`dppc_id`, `dppc_value`, `dppc_parent`, `dppc_price`, `dppc_additional_price`) VALUES
(16, 'ممبران', NULL, '', NULL),
(9, 'متریال برای جدیده', 4, '13000', NULL),
(5, 'پایین اولی بیاد', 1, '78000', NULL),
(15, 'ساده', 14, '1500000', '60000'),
(8, 'تستی زیر جدید', 4, '19000', NULL),
(14, 'ام دی اف', NULL, '', NULL),
(11, 'خصیصه', 2, '6000', NULL),
(12, 'حالت بعدی', 10, '9000', NULL),
(13, 'تست عدد', 2, '13000', NULL),
(17, 'کلاسیک', 16, '2000000', '80000'),
(18, 'نئو کلاسیک', 16, '3000000', '120000'),
(19, 'های گلاس سفید ایرانی', NULL, '', NULL),
(20, 'کلاسیک', 19, '2100000', '84000'),
(21, 'نئوکلاسیک', 19, '2500000', '100000'),
(22, 'ساده', 19, '1800000', '72000'),
(23, 'چوب طبیعی', NULL, '', NULL),
(24, 'ساده', 23, '1900000', '76000'),
(25, 'مرغوب', 23, '2000000', '80000'),
(26, 'ملامینه', NULL, '', NULL),
(27, 'های گلاس', 26, '1800000', '72000'),
(28, 'ساده', 26, '1700000', '68000'),
(29, 'کلاسیک', 26, '1900000', '76000'),
(30, 'های گلاس سفید خارجی', NULL, '', NULL),
(31, 'نئو کلاسیک', 30, '2600000', '104000'),
(32, 'های گلاس', 30, '2400000', '96000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portresumefa_dppc`
--
ALTER TABLE `portresumefa_dppc`
  ADD PRIMARY KEY (`dppc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portresumefa_dppc`
--
ALTER TABLE `portresumefa_dppc`
  MODIFY `dppc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
