-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2014 at 04:31 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `tech` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `fname`, `lname`, `tech`, `email`, `address`) VALUES
(1, 'ad', 'ad', 'ad', 'ad', 'ad'),
(43, 'sas', 'sasa', 'sas', 'asas', 'asa'),
(45, 'dsss', 'dsddd', 'dsd', 'dsd', 'sd'),
(46, 'sa', 'sasasa', 'sas', 'asas', 'sa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `password_temp` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `password_temp`, `code`, `active`, `created_at`, `updated_at`) VALUES
(16, 'agung@waindo.co.id', 'agung123', '$2y$10$N1BcpO8XXRxKNNjFflfo5uOjdW1rGpmupjBtFBM95T8O4YuW7S2Pq', '', '', 1, '2014-10-07 08:39:57', '2014-10-07 08:40:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
