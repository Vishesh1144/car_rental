-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 06:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`firstname`, `lastname`) VALUES
('', ''),
('', ''),
('vinod', 'henil'),
('vinod', 'henil'),
('vishekumar ', 'Vinodbhai');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `username` int(11) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usereg`
--

CREATE TABLE `usereg` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `contact` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usereg`
--

INSERT INTO `usereg` (`firstname`, `lastname`, `password`, `address`, `pincode`, `city`, `state`, `email`, `contact`) VALUES
('vishesh', 'Chaudhari', 'fsdfsdfsdf', 'sdfsd', 335, 'Ujjain', 'MadhyaPradesh', 'vishesh1144@gmail.com', 353223523),
('vishesh', 'Chaudhari', 'vishesh', 'sdf', 378363, 'Baripada', 'Odisha', 'vishesh1144@gmail.com', 2147483647),
('vinit', 'Patel', 'vinit1144', 'adajan depo bhangara hill', 378363, 'Champhai', 'Mizoram', 'vishesh1144@gmail.com', 851119756),
('visheshejnjhgfjshfls', 'ewfew', 'wefwf', 'fewfwfdscs', 3453, 'Kollam', 'Kerala', 'vishesh1144@gmail.com', 2147483647),
('Arun', 'verma', '121345', 'Jammu', 345353, 'Surat', 'Gujarat', 'arun@gmail.com', 123456789),
('vishekumar', 'kh', '1234', 'sfds', 343453, 'Belgaum', 'Karnataka', 'vishes4411@gmail.com', 123456789);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
