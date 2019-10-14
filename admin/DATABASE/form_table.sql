-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 11:42 PM
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
-- Table structure for table `form_table`
--

CREATE TABLE IF NOT EXISTS `form_table` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `images` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_table`
--

INSERT INTO `form_table` (`id`, `name`, `images`, `email`, `password`, `date_time`) VALUES
(138, '', 'images/09e871c98fef3b901a775def173e4126aaf73b42j.jpg', 'amit', '92410', '0000-00-00 00:00:00'),
(139, '', 'images/09e871c98fef3b901a775def173e4126aaf73b42a.png', 'amit', '90747', '0000-00-00 00:00:00'),
(140, '', 'images/09e871c98fef3b901a775def173e4126aaf73b42s.jpg', 'amit', '31580', '2019-04-03 23:13:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_table`
--
ALTER TABLE `form_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_table`
--
ALTER TABLE `form_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
