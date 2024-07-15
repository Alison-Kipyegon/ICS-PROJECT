-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 11:24 AM
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
-- Database: `restaurant_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_bookings`
--

CREATE TABLE `restaurant_bookings` (
  `restaurant_name` varchar(50) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_phone` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_of_people` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant_bookings`
--

INSERT INTO `restaurant_bookings` (`restaurant_name`, `cust_name`, `cust_email`, `cust_phone`, `date`, `time`, `no_of_people`) VALUES
('Anas Bar and Restaurant', 'Alison', 'alison.kipyegon@strathmore.edu', 712345678, '2024-07-09 00:00:00', '0000-00-00 00:00:00', 3),
('Anas Bar and Restaurant', 'Alison', 'alison.kipyegon@strathmore.edu', 712345678, '2024-07-09 00:00:00', '0000-00-00 00:00:00', 3),
('Anas Bar and Restaurant', 'Alison', 'alison.kipyegon@strathmore.edu', 2147483647, '2024-07-09 00:00:00', '0000-00-00 00:00:00', 5),
('Anas Bar and Restaurant', 'Alison', 'alison.kipyegon@strathmore.edu', 2147483647, '2024-07-09 00:00:00', '0000-00-00 00:00:00', 5),
('Anguka Nayo Bar & Grill', 'Anguuks', 'anguksnayz@gmail.com', 712345678, '2024-05-03 00:00:00', '0000-00-00 00:00:00', 64),
('Anas Bar and Restaurant', 'Alison', 'alison.kipyegon@strathmore.edu', 712345678, '2024-07-13 00:00:00', '0000-00-00 00:00:00', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
