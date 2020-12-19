-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2020 at 10:16 AM
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
  `id` varchar(10) NOT NULL,
  `receipt` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disburse_db`
--

INSERT INTO `disburse_db` (`username`, `bank_code`, `account_number`, `amount`, `remark`, `benef_name`, `timestamp`, `status`, `id`, `receipt`) VALUES
('shop1', 'bni', '1234567890', '10000', 'remark', 'PT FLIP', '0000-00-00 00:00:00', 'SUCCESS', '7993267560', ''),
('shop2', 'bni', '0987654321', '10000', 'remark', 'PT FLIP', '0000-00-00 00:00:00', 'SUCCESS', '3184933819', 'https://flip-receipt.oss-ap-southeast-5.aliyuncs.com/debit_receipt/126316_3d07f9fef9612c7275b3c36f7e1e5762.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
