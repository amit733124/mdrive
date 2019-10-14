-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 11:41 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl2`
--

CREATE TABLE IF NOT EXISTS `tbl2` (
  `id` int(11) NOT NULL,
  `username1` varchar(100) NOT NULL,
  `status` varchar(150) NOT NULL,
  `login_time_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout_time_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl2`
--

INSERT INTO `tbl2` (`id`, `username1`, `status`, `login_time_date`, `logout_time_date`) VALUES
(32, 'PRANATI', 'Offline', '2019-04-03 21:20:30', '2019-04-03 21:23:23'),
(33, 'kalidas', 'Offline', '2019-04-03 21:21:02', '2019-04-03 21:23:52'),
(34, 'amit', 'Offline', '2019-04-03 21:22:45', '2019-04-03 21:25:20'),
(35, 'amit', 'Offline', '2019-04-03 21:25:05', '2019-04-03 21:25:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl2`
--
ALTER TABLE `tbl2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl2`
--
ALTER TABLE `tbl2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
