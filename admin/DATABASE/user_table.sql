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
-- Table structure for table `user_table`
--

CREATE TABLE IF NOT EXISTS `user_table` (
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `mob_no` varchar(50) NOT NULL,
  `ques` varchar(50) NOT NULL,
  `ans` varchar(50) NOT NULL,
  `session` char(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`name`, `email`, `password`, `mob_no`, `ques`, `ans`, `session`, `date_time`) VALUES
('AMIT KUMAR BISWAS', 'amit', '12345', '8768815056', 'What is your nike name?', 'sourav', '', '0000-00-00 00:00:00'),
('bishal', 'bishal', 'Bishal1234', '7797968017', 'What is your nike name?', 'shuvo', '', '0000-00-00 00:00:00'),
('AK BISWAS', 'biswas733', 'Amit@123', '8768815047', 'What is your nike name?', 'no', '', '0000-00-00 00:00:00'),
('Kalidas Singha', 'kalidas', '12345', '7001265274', 'What is your nike name?', 'no', '', '0000-00-00 00:00:00'),
('PRANATI MAJUMDER', 'PRANATI', 'Pranati@12', '7797855866', 'Who is your fev singer?', 'arijit', '4mo3ajv94qdb9hc5n4odt6p2s2', '2019-04-03 23:36:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`email`), ADD UNIQUE KEY `username` (`email`), ADD UNIQUE KEY `mob_no` (`mob_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
