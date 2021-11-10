-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 02:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cp_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `contest_details`
--

CREATE TABLE `contest_details` (
  `contest_id` int(11) NOT NULL,
  `contest_name` varchar(100) NOT NULL,
  `contest_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `contest_duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest_details`
--

INSERT INTO `contest_details` (`contest_id`, `contest_name`, `contest_date`, `contest_duration`) VALUES
(1, 'Test Contest #1', '2020-12-31 18:30:00', '02:05:00'),
(2, 'Test Contest #2', '2021-05-31 18:30:00', '01:15:00'),
(3, 'Test Contest #3', '2021-11-30 18:30:00', '03:25:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contest_details`
--
ALTER TABLE `contest_details`
  ADD PRIMARY KEY (`contest_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
