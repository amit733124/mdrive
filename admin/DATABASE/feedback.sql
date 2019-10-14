-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 11:43 PM
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
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL,
  `first` varchar(50) NOT NULL,
  `last` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `msg` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `user_ip` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `first`, `last`, `email`, `rate`, `msg`, `user`, `user_ip`, `date_time`) VALUES
(1, 'AMIT', 'BISWAS', 'amitbiswas865@gmail.com', 'Excellent', '', 'amit', '', '2019-04-03 23:08:47'),
(4, 'AMIT KUMAR', 'BISWAS', 'amitbiswas865@gmail.com', 'Excellent', 'nice', 'amit', '', '2019-04-03 23:08:47'),
(5, 'Kalidas', 'Singha', 'kalidas@gmail.com', 'Excellent', 'sdfdgf', 'amit', '', '2019-04-03 23:08:47'),
(6, 'AMIT KUMAR', 'BISWAS', 'amitbiswas865@gmail.com', 'Excellent', 'good', 'amit', '', '2019-04-03 23:08:47'),
(7, 'Pranati', 'Majumder', 'pranati5pm@gmail.com', 'Excellent', 'Ok', 'Pranati', '', '2019-04-03 23:08:47'),
(8, 'ARIF', 'REJA', 'arifreja496@gmail.com', 'Good', 'Good', 'amit', '', '2019-04-03 23:08:47'),
(9, 'AMIT KUMAR', 'BISWAS', 'amitbiswas865@gmail', 'Excellent', 'jkjkl', 'amit', '', '2019-04-03 23:08:47'),
(10, 'AK', 'BISWAS', 'amitbiswas130398@gmail.com', 'Excellent', 'GOOD', 'amit', '::1', '2019-04-03 23:08:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
