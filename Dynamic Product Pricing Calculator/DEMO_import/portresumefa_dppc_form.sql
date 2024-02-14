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
-- Table structure for table `portresumefa_dppc_form`
--

CREATE TABLE `portresumefa_dppc_form` (
  `dppcf_id` int(11) NOT NULL,
  `dppcf_name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `dppcf_phone` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `dppcf_address` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `dppcf_product` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `dppcf_scale` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `dppcf_price` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `portresumefa_dppc_form`
--

INSERT INTO `portresumefa_dppc_form` (`dppcf_id`, `dppcf_name`, `dppcf_phone`, `dppcf_address`, `dppcf_product`, `dppcf_scale`, `dppcf_price`) VALUES
(10, 'tut', '4564564', 'rtyrty', 'ملامینه با متریال ساده', '9 متر مربع', '138312000 تومان');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portresumefa_dppc_form`
--
ALTER TABLE `portresumefa_dppc_form`
  ADD PRIMARY KEY (`dppcf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portresumefa_dppc_form`
--
ALTER TABLE `portresumefa_dppc_form`
  MODIFY `dppcf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
