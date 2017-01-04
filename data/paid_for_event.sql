-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 04, 2017 at 07:07 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kandepohe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `paid_for_event`
--

CREATE TABLE `paid_for_event` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `mihpayid` bigint(20) NOT NULL,
  `bank_ref_num` bigint(20) NOT NULL,
  `bankcode` text NOT NULL,
  `unmappedstatus` text NOT NULL,
  `addedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paid_for_event`
--

INSERT INTO `paid_for_event` (`id`, `user_id`, `event_id`, `status`, `mihpayid`, `bank_ref_num`, `bankcode`, `unmappedstatus`, `addedon`) VALUES
(1, 1, 1, 1, 1110994628, 1110994628, 'PAYUW', 'userPay', '2017-01-03 12:23:36'),
(2, 5, 1, 0, 0, 0, '', '', '0000-00-00 00:00:00'),
(3, 1, 2, 0, 0, 0, '', '', '0000-00-00 00:00:00'),
(4, 1, 2, 0, 0, 1110994628, 'PAYUW', 'userCancelled', '0000-00-00 00:00:00'),
(5, 1, 2, 0, 0, 1110994642, 'PAYUW', 'userCancelled', '2017-01-03 12:23:36'),
(6, 1, 2, 0, 1110994860, 1110994860, 'PAYUW', 'userCancelled', '2017-01-03 13:43:27'),
(7, 1, 2, 0, 1110994861, 1110994861, 'PAYUW', 'userCancelled', '2017-01-03 13:45:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paid_for_event`
--
ALTER TABLE `paid_for_event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paid_for_event`
--
ALTER TABLE `paid_for_event`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
