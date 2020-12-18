-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 01:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `disburse_db`
--

CREATE TABLE `disburse_db` (
  `username` varchar(50) NOT NULL,
  `bank_code` varchar(50) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `benef_name` varchar(50) NOT NULL,
  `timestamp` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disburse_db`
--

INSERT INTO `disburse_db` (`username`, `bank_code`, `account_number`, `amount`, `remark`, `benef_name`, `timestamp`, `status`, `id`) VALUES
('lalala', '33', '0', '0', 'MDEyOk9yZ2FuaXphdGlvbjE2MjU0NjAy', 'Petani Kode', '2020-07-19T17:22:55Z', 'Organization', '16254602');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
