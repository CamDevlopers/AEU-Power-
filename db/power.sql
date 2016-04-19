-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2016 at 03:03 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `power`
--
CREATE DATABASE IF NOT EXISTS `power` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `power`;

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE IF NOT EXISTS `box` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `floor_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `room_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_lamp` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1 = on , 0 = off',
  `status_air` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`bid`, `floor_id`, `room_id`, `title`, `room_name`, `type`, `is_lamp`, `status`, `status_air`) VALUES
(1, 1, 1, 'Lamp1', 'បន្ទប់ G05-01', 'អំពូល', 1, 1, 1),
(2, 1, 1, 'Air 1', 'បន្ទប់ G05-01', 'ម.ត្រជាក់', 0, 0, 0),
(3, 1, 1, 'Fan1', 'បន្ទប់ G05-01', 'ម.ត្រជាក់', 0, 0, 0),
(4, 1, 2, 'Air 2', 'បន្ទប់ G05-02', 'អំពូល', 1, 0, 0),
(5, 1, 2, 'Air 2', 'បន្ទប់ G05-02', 'ម.ត្រជាក់', 0, 0, 0),
(6, 1, 2, 'Air 2', 'បន្ទប់ G05-02', 'ម.ត្រជាក់', 0, 0, 0),
(7, 1, 3, 'Air 2', 'បន្ទប់ G05-03', 'អំពូល', 1, 0, 0),
(8, 1, 3, 'Air 2', 'បន្ទប់ G05-03', 'ម.ត្រជាក់', 0, 0, 0),
(9, 1, 3, 'Air 2', 'បន្ទប់ G05-03', 'ម.ត្រជាក់', 0, 0, 0),
(10, 1, 4, 'Air 2', 'បន្ទប់ G05-04', 'អំពូល', 1, 0, 0),
(11, 1, 4, 'Air 2', 'បន្ទប់ G05-04', 'ម.ត្រជាក់', 0, 0, 0),
(12, 1, 4, 'Air 2', 'បន្ទប់ G05-04', 'ម.ត្រជាក់', 0, 0, 0),
(13, 1, 5, 'Air 2', 'បន្ទប់ G05-05', 'អំពូល', 1, 0, 0),
(14, 1, 5, 'Air 2', 'បន្ទប់ G05-05', 'ម.ត្រជាក់', 0, 0, 0),
(15, 1, 5, 'Air 2', 'បន្ទប់ G05-05', 'ម.ត្រជាក់', 0, 0, 0),
(16, 1, 6, 'Air 2', 'បន្ទប់ G05-06', 'អំពូល', 1, 0, 0),
(17, 1, 6, 'Air 2', 'បន្ទប់ G05-06', 'ម.ត្រជាក់', 0, 0, 0),
(18, 1, 6, 'Air 2', 'បន្ទប់ G05-06', 'ម.ត្រជាក់', 0, 0, 0),
(19, 2, 7, 'Air 2', 'បន្ទប់ G06-06', 'អំពូល', 1, 0, 0),
(20, 2, 7, 'Air 2', 'បន្ទប់ G06-06', 'ម.ត្រជាក់', 0, 0, 0),
(21, 2, 7, 'Air 2', 'បន្ទប់ G06-06', 'ម.ត្រជាក់', 0, 0, 0),
(22, 2, 7, 'Air 2', 'បន្ទប់ G06-06', 'ម.ត្រជាក់', 0, 0, 0),
(23, 2, 7, 'Air 2', 'បន្ទប់ G06-06', 'ម.ត្រជាក់', 0, 0, 0),
(24, 3, 8, 'Air 2', 'បន្ទប់ G07-04', 'អំពូល', 1, 0, 0),
(25, 3, 8, 'Air 2', 'បន្ទប់ G07-04\n', 'ម.ត្រជាក់', 0, 0, 0),
(26, 3, 8, 'Air 2', 'បន្ទប់ G07-04\n', 'ម.ត្រជាក់', 0, 0, 0),
(27, 3, 8, 'Air 2', 'បន្ទប់ G07-04', 'ម.ត្រជាក់', 0, 0, 0),
(28, 3, 8, 'Air 2', 'បន្ទប់ G07-04', 'ម.ត្រជាក់', 0, 0, 0),
(29, 0, 0, 'Air 2', 'បន្ទប់', 'ម.ត្រជាក់', 0, 0, 0),
(30, 0, 0, 'Air 2', 'បន្ទប់', 'អំពូល', 1, 0, 0),
(31, 0, 0, 'Air 2', 'បន្ទប់', 'ម.ត្រជាក់', 0, 0, 0),
(32, 0, 0, 'Air 2', 'បន្ទប់', 'ម.ត្រជាក់', 0, 0, 0),
(33, 0, 0, 'Air 2', 'បន្ទប់', 'អំពូល', 1, 0, 0),
(34, 0, 0, 'Air 2', 'បន្ទប់', 'ម.ត្រជាក់', 0, 0, 0),
(35, 0, 0, 'Air 2', 'បន្ទប់', 'ម.ត្រជាក់', 0, 0, 0),
(36, 0, 0, 'Air 2', 'បន្ទប់', 'អំពូល', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`cid`, `company_name`, `logo`) VALUES
(1, 'ASIA EURO UNIVERSITY (AEU)', 'Logo_AEU.png');

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE IF NOT EXISTS `floor` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `floor_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`f_id`, `floor_name`) VALUES
(1, 'ជាន់ទី៥'),
(2, 'ជាន់ទី៦'),
(3, 'ជាន់ទី៧');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `floor_id` int(11) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `floor_id`) VALUES
(1, 'បន្ទប់ G05-01', 1),
(2, 'បន្ទប់ G05-02', 1),
(3, 'បន្ទប់ G05-03', 1),
(4, 'បន្ទប់ G05-04', 1),
(5, 'បន្ទប់ G05-05', 1),
(6, 'បន្ទប់ G05-06', 1),
(7, 'បន្ទប់ G06-06', 2),
(8, 'បន្ទប់ G07-04', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `username`, `password`) VALUES
(1, 'sreyleak', 'admin', '6dadb9d0b6cdf991de87244cd8383bea');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
