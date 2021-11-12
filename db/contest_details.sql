-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2021 at 08:03 PM
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
  `contest_duration` time NOT NULL,
  `contest_author` varchar(100) DEFAULT NULL,
  `contest_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest_details`
--

INSERT INTO `contest_details` (`contest_id`, `contest_name`, `contest_date`, `contest_duration`, `contest_author`, `contest_description`) VALUES
(1, 'Round #1', '2021-11-12 18:27:47', '02:05:00', 'moses', 'We are very glad to invite you to the cp contest #1, which will be held on Friday, November 12, 2021 at 20:05UTC+5.5. <br><br>  All the problems were authored and prepared by moses. We have tried our best to create an interesting problemset with clear statements. Hope you enjoy the round .<br><br> The round will be hosted by rules of educational rounds (extended ACM-ICPC). <br><br> Thus, during the round, solutions will be judged on preliminary tests, and after the round, it will be a 12-hour phase of open hacks. We tried to make tests strong enough but it doesn\'t at all guarantee that open hacks phase will be pointless. <br><br> You will be given 8 problems and 2 hours to solve them. We remind you that the penalty for the wrong submission in this round (and the following Div. 3 rounds) is 10 minutes. Also please note that the number of problems has slightly increased since the last edit.'),
(2, 'Round #2', '2021-11-12 18:29:10', '01:15:00', 'arun', 'We are very glad to invite you to the div contest #2, which will be held on Friday, November 12, 2021 at 20:05UTC+5.5. <br><br>  All the problems were authored and prepared by moses. We have tried our best to create an interesting problemset with clear statements. Hope you enjoy the round .<br><br> The round will be hosted by rules of educational rounds (extended ACM-ICPC). <br><br> Thus, during the round, solutions will be judged on preliminary tests, and after the round, it will be a 12-hour phase of open hacks. We tried to make tests strong enough but it doesn\'t at all guarantee that open hacks phase will be pointless. <br><br> You will be given 8 problems and 2 hours to solve them. We remind you that the penalty for the wrong submission in this round (and the following Div. 3 rounds) is 10 minutes. Also please note that the number of problems has slightly increased since the last edit.'),
(3, 'Round #3', '2021-11-12 18:29:32', '03:25:00', 'arun gopi', 'We are very glad to invite you to the cp contest #1, which will be held on Friday, November 12, 2021 at 20:05UTC+5.5. <br><br>  All the problems were authored and prepared by moses. We have tried our best to create an interesting problemset with clear statements. Hope you enjoy the round .<br><br> The round will be hosted by rules of educational rounds (extended ACM-ICPC). <br><br> Thus, during the round, solutions will be judged on preliminary tests, and after the round, it will be a 12-hour phase of open hacks. We tried to make tests strong enough but it doesn\'t at all guarantee that open hacks phase will be pointless. <br><br> You will be given 8 problems and 2 hours to solve them. We remind you that the penalty for the wrong submission in this round (and the following Div. 3 rounds) is 10 minutes. Also please note that the number of problems has slightly increased since the last edit.');

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
